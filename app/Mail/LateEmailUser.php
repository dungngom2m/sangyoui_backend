<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LateEmailUser extends Mailable
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
            ->text('mails.late-email-user')
            ->subject('＜産業医支アサインシステム＞遅刻連絡がされました')
            ->with([
                'data' => $this->data,
            ]);
    }
}
