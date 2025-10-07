<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('Nouveau message depuis votre portfolio')
                    ->view('emails.contact_message')
                    ->with([
                        'name' => $this->contact->name,
                        'email' => $this->contact->email,
                        'messageContent' => $this->contact->message,
                    ]);
    }
}
