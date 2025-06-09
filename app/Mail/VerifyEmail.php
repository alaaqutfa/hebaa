<?php
namespace App\Mail;

use App\Models\PendingUser;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    // https://mailtrap.io/
    use Queueable, SerializesModels;

    public $pending;

    public function __construct(PendingUser $pending)
    {
        $this->pending = $pending;
    }

    public function build()
    {
        return $this->subject('Confirm your registration')
            ->view('emails.verify')
            ->with([
                'link' => route('auth.verify.email', ['token' => $this->pending->token]),
            ]);
    }

}
