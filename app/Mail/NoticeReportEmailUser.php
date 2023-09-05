<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NoticeReportEmailUser extends Mailable
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
            ->text('mails.notice-report-email-user')
            ->subject('＜面接おまかせくん＞面接後の未提出結果報告書が◯件あります')
            ->with([
                'data' => $this->data,
            ]);
    }
}
