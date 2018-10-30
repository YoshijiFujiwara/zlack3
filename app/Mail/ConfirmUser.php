<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($randomNumberString)
    {
        $this->randomNumberStr = $randomNumberString;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('feedback@zlack.com')
            ->view('emails.confirmUser')
            ->with([
                'randomNumberStr' => $this->randomNumberStr
            ]);
    }
}
