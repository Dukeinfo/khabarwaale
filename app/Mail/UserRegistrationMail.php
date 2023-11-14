<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $name;

    public $password;
    public $role;
    public $permissions;
    public $menuAssignments;

    public function __construct($email,$name, $password, $role, $permissions = [], $menuAssignments = [])
    {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
        $this->role = $role;
        $this->permissions = $permissions;
        $this->menuAssignments = $menuAssignments;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to our NewsPortal',
        );

   
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.create-user',
            with :[
                'email_address' => $this->email,
                'name' => $this->name,
                'password' => $this->password,
                'role' => $this->role,
                'permissions' => $this->permissions,
                'menuAssignments' => $this->menuAssignments,
            ]
            
        );
        
    }

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
