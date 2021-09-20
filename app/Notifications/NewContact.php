<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContact extends Notification
{
    use Queueable;

    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Voce recebeu um novo contato do site:')
                    ->line($this->contact->email)
                    ->line($this->contact->name)
                    ->line($this->contact->message);
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
