<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistAccountSangyoiPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The array instance.
     *
     * @var array
     */
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->text('mails.regist-account-sangyoi-password')
            ->subject('＜面接おまかせくん＞長時間労働者面接システム 面接おまかせくん のアカウントが作成されました。')
            ->with([
                'data' => $this->data,
            ]);
    }
}
