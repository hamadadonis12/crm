<?php

namespace App\Notifications;

use App\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PassportExpiry extends Notification
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
        if ($notifiable instanceof Client || $notifiable instanceof \App\User) {
            return ['mail'];
        }

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
                    ->line('Your passport will expire in '.env('PASSPORT_EXPIRY_DAYS').' days')
					->subject('Client Passport Expiry');
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
            'message' => $this->clientName.' passport will expire in '.env('PASSPORT_EXPIRY_DAYS').' days',
        ];
    }
}
