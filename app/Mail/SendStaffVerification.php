<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendStaffVerification extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $uniqueId = str_pad(mt_rand(1,9999999),7,'0',STR_PAD_LEFT);

        return new Envelope(
            subject: 'Staff Verification-'.$uniqueId,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mdd.pages.email.request_account',
            with:['id' => $this->user,
                    'uqid' => $this->user,
                    ],
                );
    }


 // return new Content(
 //            view: 'mdd.pages.email.request_account',
 //        )->with([
 //                        'id' => $this->user->id,
 //                        'hash' => $this->user->hash,
 //                    ]);


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
