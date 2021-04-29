<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, string $token)
    {
        $this->token = $token;
        $this->name = $name;
        $this->subject('Email Confirmation');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('auth.email.emailconfirmation');
    }
}
