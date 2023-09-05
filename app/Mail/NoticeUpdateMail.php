<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NoticeUpdateMail extends Mailable
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
            ->text('mails.notice-update-mail')
            ->subject('＜面接おまかせくん＞面接結果報告書・意見書が提出されました')
            ->with([
                'data' => $this->data,
            ]);
    }
}
