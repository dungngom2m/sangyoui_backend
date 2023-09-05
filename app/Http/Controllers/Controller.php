<?php

namespace App\Http\Controllers;

use App\Mail\NoticeChangeScheduleEmail;
use App\Mail\NoticeEmail24hSangyoi;
use App\Mail\NoticeEmail48hSangyoi;
use App\Mail\NoticeReportEmailSangyoi;
use App\Mail\NoticeReportEmailUser;
use App\Mail\NoticeReportEmailUser2;
use App\Mail\NoticeUpdateEmployee;
use App\Models\MClientUser;
use App\Models\TQuestionAnswer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Jubaer\Zoom\Facades\Zoom;
use Spatie\Permission\Models\Role;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public const implementationStatus = [
        [
            'label' => 'セルフチェック回答待ち',
            'id' => 0
        ],
        [
            'label' => '面談実施待ち',
            'id' => 1
        ],
        [
            'label' => '意見書提出待ち',
            'id' => 2
        ],
        [
            'label' => '意見書確認中',
            'id' => 3
        ],
        [
            'label' => '意見書提出済',
            'id' => 4
        ],
        [
            'label' => 'クライアント確認済',
            'id' => 5
        ],
        [
            'label' => 'キャンセル',
            'id' => 9
        ]
    ];

    public const chiikiCd = [
        [
            'label' => '北海道',
            'id' => 1
        ],
        [
            'label' => '東北',
            'id' => 2
        ],
        [
            'label' => '関東',
            'id' => 3
        ],
        [
            'label' => '北陸・信越',
            'id' => 4
        ],
        [
            'label' => '東海',
            'id' => 5
        ],
        [
            'label' => '近畿',
            'id' => 6
        ],
        [
            'label' => '中国',
            'id' => 7
        ],
        [
            'label' => '四国',
            'id' => 8
        ],
        [
            'label' => '九州・沖縄',
            'id' => 9
        ],
        [
            'label' => 'その他',
            'id' => 99
        ]
    ];

    public const kozaType = [
        [
            'label' => '普通預金',
            'id' => 0
        ],
        [
            'label' => '当座預金',
            'id' => 1
        ],
        [
            'label' => '貯蓄預金',
            'id' => 2
        ]
    ];

    /**
     * It checks if the user is logged in as an admin, company, or member, and returns the user object
     * if they are
     *
     * @param permissions An array of permissions to check.
     */
    public function getAuthCurrent($roles = ["admin", "business", "accountant", "coordinate"])
    {
        $account = auth()->guard()->user();
        if ($account && $account->role && in_array($account->role->name, $roles)) {
            // $account->role = $account->role->name;
            return $account;
        }
        return false;
    }

    /**
     * If the user has the permission, return true, else return false
     *
     * @param permissions The permissions you want to check.
     */
    public function hasPermission($permission)
    {
        $account = auth()->guard()->user();
        if (!$account || !$account->role) {
            return false;
        }

        $role = Role::findByName($account->role->name);
        return $role->permissions()->where('name', $permission)->select('name')->exists();
    }

    /**
     * It takes a string, removes all commas, and returns the integer value of the string
     *
     * @param str The string to be formatted.
     *
     * @return the integer value of the string.
     */
    public function formatPrice($str)
    {
        $str = str_replace(',', '', $str);
        return intval($str);
    }

    /**
     * @param int $code
     * @param array $data
     * @param string $message
     * @param array $errors
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function response($code = 200, $data = [], $message = '', $errors = [])
    {
        return response()->json([
            'code'    => $code,
            'data'    => (object) $data,
            'message' => $errors ? array_values($errors->toArray())[0][0] : $message,
            'errors'  => $errors,
        ], $code);
    }

    /**
     * @param int $limit
     *
     * @return int
     */
    public function getRowsPerPage($limit = 20)
    {
        $rowsPerPage = 0;

        if (request()->has('rowsPerPage')) {
            $rowsPerPage = request()->rowsPerPage ? intval(request()->rowsPerPage) : $limit;
        } elseif (request()->has('itemsPerPage')) {
            $rowsPerPage = request()->itemsPerPage ? intval(request()->itemsPerPage) : $limit;
        }

        return ($rowsPerPage == -1) ? 100000 : $rowsPerPage;
    }

    /**
     * @param string $defaulSort
     *
     * @return string
     */
    public function getSortBy()
    {
        return $this->camelCase2UnderScore(request()->orderBy ? request()->orderBy : 'id');
    }

    /**
     * @return string
     */
    public function getSortDirection($dir = 'desc')
    {
        return request()->orderSort ? request()->orderSort : $dir;
    }

    /**
     * It converts a camelCase string to an underscore separated string.
     *
     * @param str The string to convert.
     * @param separator The separator to use between words. Defaults to an underscore.
     *
     * @return the string with the first letter lowercased and the rest of the string with the first
     * letter of each word capitalized.
     */
    public function camelCase2UnderScore($str, $separator = "_")
    {
        if (empty($str)) {
            return $str;
        }
        $str = lcfirst($str);
        $str = preg_replace("/[A-Z]/", $separator . "$0", $str);
        return strtolower($str);
    }

    /**
     * It converts all the keys in an array to camelCase.
     *
     * @param array The array to be converted.
     */
    public function camelKeys($array)
    {
        $result = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $value = $this->camelKeys($value);
            }
            $result[$this->camelCase2UnderScore($key)] = $value;
        }
        return $result;
    }

    /**
     * It returns the current date in the format of YYYYMMDD
     */
    public function folderNow()
    {
        $mytime = Carbon::now();
        return str_replace('-', '', $mytime->toDateString());
    }

    /**
     * It generates a unique token
     *
     * @return A string of unique characters and the current time.
     */
    public function generateToken()
    {
        return uniqid() . uniqid() . uniqid() . uniqid() . time();
    }

    public function generatePhone($phone) {
        if (strlen($phone) == 11) $firstNum = '+81';
        else $firstNum = '+84';

        $phone = $firstNum . substr($phone, 1);

        return $phone;
    }

    /**
     * Send SMS
     * @param mixed $phone
     * @param mixed $content
     * @return \Aws\Result
     */
    public function sendSMS($phone, $content)
    {
        $phone = $this->generatePhone($phone);

        $sns = new \Aws\Sns\SnsClient([
            'version' => 'latest',
            'region' => 'ap-northeast-1',
            'credentials' => array(
                'key' => env('AWS_SNS_ACCESS_KEY') ?: $_SERVER['AWS_SNS_ACCESS_KEY'],
                'secret' => env('AWS_SNS_SECRET_ACCESS_KEY') ?: $_SERVER['AWS_SNS_SECRET_ACCESS_KEY'],
            )
        ]);

        $args = array(
            'Message' => $content, // REQUIRED
            "MessageAttributes" => [
                'AWS.SNS.SMS.SMSType' => [
                    'DataType' => 'String',
                    'StringValue' => 'Promotional'
                ]
            ],
            'PhoneNumber' => $phone,
            'Subject' => 'test sms',
        );

        return $sns->publish($args);
    }

    /**
     * Upload template excel.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadTemplate(Request $request, $name) {
        try {
            $rules = [
                'excelFile' => ['mimes:xlsx', 'max:' . env('MB_EXCEL') ?: $_SERVER['MB_EXCEL']],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            if ($request->file('excelFile')) {
                $path = Storage::disk("s3")->put(
                    "downloads/{$name}.xlsx",
                    file_get_contents($request->file('excelFile'))
                );
            }

            return $this->response(200, [
                'path' => $path
            ], __('text.upload_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.upload_failed'));
        }
    }

    /**
     * Random password
     * @return string
     */
    public function randomPassword($length = 8) {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    /**
     * Create zoom meeting.
     * @return array
     */
    public function createZoomMeeting($clientId, $clientSecret, $accountId) {
        $password = $this->randomPassword();

        config([
            'zoom.client_id' => $clientId,
            'zoom.client_secret' => $clientSecret,
            'zoom.account_id' => $accountId
        ]);

        return Zoom::createMeeting([
            "agenda" => 'Sangyoui',
            "topic" => 'Sangyoui',
            "type" => 2,
            "duration" => 60,
            "timezone" => 'Asia/Japan',
            "password" => $password,
            "start_time" => Carbon::now(),
            "pre_schedule" => false,
            "settings" => [
                'join_before_host' => true,
                'host_video' => false,
                'participant_video' => false,
                'mute_upon_entry' => false,
                'waiting_room' => false,
                'audio' => 'both',
                'auto_recording' => 'none',
                'approval_type' => 0,
            ],
        ]);
    }

    public function notice24h($resource) {
        $now = Carbon::create(Carbon::now()->format('Y-m-d') . ' 09:00:00');
        $nextDay = Carbon::create(Carbon::now()->addDay()->format('Y-m-d') . ' 08:59:00');

        foreach ($resource as $item) {
            $reserveDate = Carbon::create($item->reserve_date);
            $reserveTimeFrom = Carbon::create($item->reserve_time_from);
            $date = Carbon::create($reserveDate->format('Y-m-d') . ' ' . $reserveTimeFrom->format('H:i:s'));

            if ($now->lessThanOrEqualTo($date) && $date->lessThanOrEqualTo($nextDay) && $item->reserve_status == 0) {
                // Send SMS
                $url = sprintf('%s/auth/forward-to-email-interview/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $item->notice_id);
                $url2 = sprintf('%s/schedule/cancel/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $item->notice_id);

                $content = "【面接おまかせくん】
面接24時間前です。
{$date}になりましたら下記URLから参加し、面接を受けてください。

zoom面接情報
ミーティングID:{$item->zoom_meeting_id}
ミーティングPW:{$item->zoom_meeting_pw}
リンク：{$item->zoom_meeting_url}

PCへの転送を希望の方は下記のリンクから転送先のメールアドレスを入力してください。
{$url}

原則としてこの後のキャンセルや10分以上の遅刻は、キャンセルルールに従いキャンセル料が発生いたします。

キャンセルや10分以内の遅刻をする場合下記のリンクから手続きを行なってください。

{$url2}";

                (new Controller())->sendSMS($item->sms_number, $content);

                // Send Email
                $cancelUrl = sprintf('%s/cp/sangyoi/cancel-or-lateness/', env('FRONT_URL') ?: $_SERVER['FRONT_URL']);
                $reportUrl = sprintf('%s/cp/sangyoi/hospital-detail/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $item->reserve_id);

                Mail::to($item->contact_mailaddr)->send(new NoticeEmail24hSangyoi([
                    'sangyoiName' => $item->name,
                    'reserveDate' => Carbon::create($item->reserve_date)->format('Y/m/d'),
                    'reserveTimeFrom' => Carbon::create($item->reserve_time_from)->format('H:i'),
                    'reserveTimeTo' => Carbon::create($item->reserve_time_to)->format('H:i'),
                    'zoomMeetingUrl' => $item->zoom_meeting_url,
                    'zoomMeetingId' => $item->zoom_meeting_id,
                    'zoomMeetingPw' => $item->zoom_meeting_pw,
                    'userCompanyName' => $item->user_company_name,
                    'cancelUrl' => $cancelUrl,
                    'reportUrl' => $reportUrl,
                    'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                    'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR']
                ]));
            }
        }
    }

    public function notice48h($resource) {
        $now = Carbon::create(Carbon::now()->addDay()->format('Y-m-d') . ' 09:00:00');
        $nextDay = Carbon::create(Carbon::now()->addDays(2)->format('Y-m-d') . ' 08:59:00');

        foreach ($resource as $item) {
            $reserveDate = Carbon::create($item->reserve_date);
            $reserveTimeFrom = Carbon::create($item->reserve_time_from);
            $date = Carbon::create($reserveDate->format('Y-m-d') . ' ' . $reserveTimeFrom->format('H:i:s'));

            if ($now->lessThanOrEqualTo($date) && $date->lessThanOrEqualTo($nextDay) && $item->reserve_status == 0) {
                $envTel = env('ENV_TEL') ?: $_SERVER['ENV_TEL'];
                $envHour = env('ENV_HOUR') ?: $_SERVER['ENV_HOUR'];
                // Send SMS
                $url = sprintf('%s/auth/forward-to-email-interview/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $item->notice_id);
                $url2 = sprintf('%s/schedule/cancel/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $item->notice_id);

                $content = "【面接おまかせくん】
面接48時間前です。
{$date}になりましたら下記URLから参加し、面接を受けてください。

zoom面接情報
ミーティングID:{$item->zoom_meeting_id}
ミーティングPW:{$item->zoom_meeting_pw}
リンク：{$item->zoom_meeting_url}

PCへの転送を希望の方は下記のリンクから転送先のメールアドレスを入力してください。
{$url}

面接予約の変更を行う場合は下記のリンクから行なってください。

{$url2}

日本産業医支援機構TEL：{$envTel}
問合せ時間　{$envHour}";

                (new Controller())->sendSMS($item->sms_number, $content);

                // Send Email
                $cancelUrl = sprintf('%s/cp/sangyoi/cancel-or-lateness/', env('FRONT_URL') ?: $_SERVER['FRONT_URL']);
                $reportUrl = sprintf('%s/cp/sangyoi/hospital-detail/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $item->reserve_id);

                Mail::to($item->contact_mailaddr)->send(new NoticeEmail48hSangyoi([
                    'sangyoiName' => $item->name,
                    'reserveDate' => Carbon::create($item->reserve_date)->format('Y/m/d'),
                    'reserveTimeFrom' => Carbon::create($item->reserve_time_from)->format('H:i'),
                    'reserveTimeTo' => Carbon::create($item->reserve_time_to)->format('H:i'),
                    'zoomMeetingUrl' => $item->zoom_meeting_url,
                    'zoomMeetingId' => $item->zoom_meeting_id,
                    'zoomMeetingPw' => $item->zoom_meeting_pw,
                    'userCompanyName' => $item->user_company_name,
                    'cancelUrl' => $cancelUrl,
                    'reportUrl' => $reportUrl,
                    'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                    'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR']
                ]));
            }
        }
    }

    public function noticeUpdateEmployee($resource, $resource2) {
        $now = Carbon::now();

        if ($now->day == 1) {
            foreach($resource as $item) {
                $url = sprintf('%s/cp/client/update-employee/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $item->employee_id);

                if (isset($item->manager_mailaddr_1)) {
                    $clientUser1 = MClientUser::where('user_company_id', '=', $item->user_company_id)
                                                ->where('client_id', '=', $item->client_id)
                                                ->where('mailaddr', $item->manager_mailaddr_1)
                                                ->first();

                    Mail::to($item->manager_mailaddr_1)->send(new NoticeUpdateEmployee([
                        'clientUserName' => $clientUser1->name ?? $item->manager_name_1,
                        'employeeId' => $item->employee_id,
                        'url' => $url,
                        'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                        'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR']
                    ]));
                }

                if (isset($item->manager_mailaddr_2)) {
                    $clientUser2 = MClientUser::where('user_company_id', '=', $item->user_company_id)
                                                ->where('client_id', '=', $item->client_id)
                                                ->where('mailaddr', $item->manager_mailaddr_2)
                                                ->first();

                    Mail::to($item->manager_mailaddr_2)->send(new NoticeUpdateEmployee([
                        'clientUserName' => $clientUser2->name ?? $item->manager_name_2,
                        'employeeId' => $item->employee_id,
                        'url' => $url,
                        'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                        'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR']
                    ]));
                }

                if (isset($item->manager_mailaddr_3)) {
                    $clientUser3 = MClientUser::where('user_company_id', '=', $item->user_company_id)
                                                ->where('client_id', '=', $item->client_id)
                                                ->where('mailaddr', $item->manager_mailaddr_3)
                                                ->first();

                    Mail::to($item->manager_mailaddr_3)->send(new NoticeUpdateEmployee([
                        'clientUserName' => $clientUser3->name ?? $item->manager_name_3,
                        'employeeId' => $item->employee_id,
                        'url' => $url,
                        'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                        'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR']
                    ]));
                }

                if (isset($item->manager_mailaddr_4)) {
                    $clientUser4 = MClientUser::where('user_company_id', '=', $item->user_company_id)
                                                ->where('client_id', '=', $item->client_id)
                                                ->where('mailaddr', $item->manager_mailaddr_4)
                                                ->first();

                    Mail::to($item->manager_mailaddr_4)->send(new NoticeUpdateEmployee([
                        'clientUserName' => $clientUser4->name ?? $item->manager_name_4,
                        'employeeId' => $item->employee_id,
                        'url' => $url,
                        'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                        'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR']
                    ]));
                }

                if (isset($item->manager_mailaddr_5)) {
                    $clientUser5 = MClientUser::where('user_company_id', '=', $item->user_company_id)
                                                ->where('client_id', '=', $item->client_id)
                                                ->where('mailaddr', $item->manager_mailaddr_5)
                                                ->first();

                    Mail::to($item->manager_mailaddr_5)->send(new NoticeUpdateEmployee([
                        'clientUserName' => $clientUser5->name ?? $item->manager_name_5,
                        'employeeId' => $item->employee_id,
                        'url' => $url,
                        'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                        'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR']
                    ]));
                }
            }
        } else {
            (new Controller())->noticeReport($resource2);
        }
    }

    public function noticeReport($resource2) {
        // Group reserve id
        $resource2New = $resource2->groupBy('reserve_id')->map(function ($item) {
            return $item->first();
        });

        foreach($resource2New as $item) {
            $reportUrl = sprintf('%s/cp/sangyoi/hospital-detail/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $item->reserve_id);

            Mail::to($item->doctor_mailaddr)->send(new NoticeReportEmailSangyoi([
                'sangyoiName' => $item->doctor_name,
                'reserveDate' => Carbon::create($item->reserve_date)->format('Y/m/d'),
                'reserveTimeFrom' => Carbon::create($item->reserve_time_from)->format('H:i'),
                'reserveTimeTo' => Carbon::create($item->reserve_time_to)->format('H:i'),
                'employeeName' => $item->emp_name,
                'reportUrl' => $reportUrl,
                'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR']
            ]));
        }

        // Group user mail
        $userResource = $resource2->groupBy('user_mailaddr')->map(function ($user) {
            return $user->first();
        });

        foreach($userResource as $item) {
            Mail::to($item->user_mailaddr)->send(new NoticeReportEmailUser([
                'count' => count($resource2),
            ]));
        }
    }

    public function noticeReportUser($resource2) {
        foreach($resource2 as $item) {
            $url = sprintf('%s/cp/user/hospital/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $item->notice_id);

            Mail::to($item->user_mailaddr)->send(new NoticeReportEmailUser2([
                'sangyoiName' => $item->doctor_name,
                'reserveDate' => Carbon::create($item->reserve_date)->format('Y/m/d'),
                'reserveTimeFrom' => Carbon::create($item->reserve_time_from)->format('H:i'),
                'reserveTimeTo' => Carbon::create($item->reserve_time_to)->format('H:i'),
                'employeeName' => $item->emp_name,
                'url' => $url,
            ]));
        }
    }

    public function noticeChangeSchedule($resource3) {
        $resource3 = $resource3->groupBy('user_mailaddr')->map(function ($item) {
            return $item;
        });

        $now = Carbon::create(Carbon::now()->subDay()->format('Y-m-d') . ' 09:00:00');
        $nextDay = Carbon::create(Carbon::now()->addDay()->format('Y-m-d') . ' 08:59:00');

        // Filter valid date
        foreach ($resource3 as $key => $item) {
            $item = $item->filter(function ($item2) use ($now, $nextDay) {
                $date = Carbon::create($item2->updated_at);

                return $now->lessThanOrEqualTo($date) && $date->lessThanOrEqualTo($nextDay);
            });
            $resource3[$key] = $item;
        }

        // Group by doctor
        foreach ($resource3 as $key => $item) {
            $item = $item->groupBy('doctor_name')->map(function ($item2) {
                return $item2->first();
            });
            $resource3[$key] = $item;
        }

        foreach($resource3 as $mail => $item) {
            $url = sprintf('%s/cp/user/schedule/', env('FRONT_URL') ?: $_SERVER['FRONT_URL']);

            Mail::to($mail)->send(new NoticeChangeScheduleEmail([
                'item' => $item,
                'url' => $url,
            ]));
        }
    }

    public function calculateScoreAnswer($noticeId) {
        $scoreQuestion1 = TQuestionAnswer::where('reserve_issue_id', $noticeId)
                                        ->where('question_lev1_no', 1)
                                        ->orderBy('question_lev1_no', 'asc')
                                        ->orderBy('question_lev2_no', 'asc')
                                        ->distinct('question_lev1_no', 'question_lev2_no')
                                        ->get();

        $tempScoreAnswer1 = 0;
        foreach($scoreQuestion1 as $item) {
            $tempScoreAnswer1 += $item->answer_score;
        }

        $resultText1 = null;
        $resultScoreAnswer1 = null;
        if ($tempScoreAnswer1 >= 0 && $tempScoreAnswer1 <= 2) {
            $resultScoreAnswer1 = 0; // I
            $resultText1 = 'I';
        } elseif ($tempScoreAnswer1 >= 3 && $tempScoreAnswer1 <= 7) {
            $resultScoreAnswer1 = 1; // II
            $resultText1 = 'II';
        } elseif ($tempScoreAnswer1 >= 8 && $tempScoreAnswer1 <= 14) {
            $resultScoreAnswer1 = 2; // III
            $resultText1 = 'III';
        } else {
            $resultScoreAnswer1 = 3; // IV
            $resultText1 = 'IV';
        }

        $scoreQuestion2 = TQuestionAnswer::where('reserve_issue_id', $noticeId)
                                        ->where('question_lev1_no', 2)
                                        ->orderBy('question_lev1_no', 'asc')
                                        ->orderBy('question_lev2_no', 'asc')
                                        ->distinct('question_lev1_no', 'question_lev2_no')
                                        ->get();

        $tempScoreAnswer2 = 0;
        foreach($scoreQuestion2 as $item) {
            $tempScoreAnswer2 += $item->answer_score;
        }

        $resultText2 = null;
        $resultScoreAnswer2 = null;
        if ($tempScoreAnswer2 == 0) {
            $resultScoreAnswer2 = 0; // A
            $resultText2 = 'A';
        } elseif ($tempScoreAnswer2 >= 1 && $tempScoreAnswer2 <= 5) {
            $resultScoreAnswer2 = 1; // B
            $resultText2 = 'B';
        } elseif ($tempScoreAnswer2 >= 6 && $tempScoreAnswer2 <= 11) {
            $resultScoreAnswer2 = 2; // C
            $resultText2 = 'C';
        } else {
            $resultScoreAnswer2 = 3; // D
            $resultText2 = 'D';
        }

        // A B C D
        $array1 = array(0, 0, 2, 4); // I
        $array2 = array(0, 1, 3, 5); // II
        $array3 = array(0, 2, 4, 6); // III
        $array4 = array(1, 3, 5, 7); // IV

        $array = array($array1, $array2, $array3, $array4);

        $resultScoreAnswer = $array[$resultScoreAnswer1][$resultScoreAnswer2];

        $resultText3 = null;
        if ($resultScoreAnswer >= 0 && $resultScoreAnswer <= 1) {
            $resultText3 = '仕事による負担度は低いと考えられる';
        } elseif ($resultScoreAnswer >= 2 && $resultScoreAnswer <= 3) {
            $resultText3 = '仕事による負担度はやや高いと考えられる';
        } elseif ($resultScoreAnswer >= 4 && $resultScoreAnswer <= 5) {
            $resultText3 = '仕事による負担度は高いと考えられる';
        } else {
            $resultText3 = '仕事による負担度は非常に高いと考えられる';
        }

        return [
            $resultText1,
            $resultText2,
            $resultText3
        ];
    }
}
