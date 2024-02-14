<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class NewContentNotification extends Notification
{
    use Queueable;
    protected $content;

    /**
     * Create a new notification instance.
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */

     public function via($notifiable)
     {
         return ['mail'];
     }

    /**
     * Get the mail representation of the notification.
     */

    public function toMail($notifiable)
    {
        $url = ''; // Set the URL to the specific news or blog

        return (new MailMessage)
             ->from('tayeanimaw@gmail.com', 'Taye Animaw')
            ->subject('New Content Added')
            ->line('New content has been added. Check it out!')
            ->action('View Newsletter', url('www.yessethiopia.org' . $notifiable->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
