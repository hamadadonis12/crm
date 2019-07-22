<?php

namespace App\Notifications;

use App\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ClientBirth extends Notification
{
    use Queueable;

    protected $clientName;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($clientName = null)
    {
        $this->clientName = $clientName;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
         if($notifiable instanceof Client)
            return ['mail'];
        else
            return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Wishing you a day that is as special in every way as you are. Happy Birthday!')
					->subject('Happy Birthday from World Wide Travel & Tourism');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->clientName.' birthday is today',
        ];
    }
}
