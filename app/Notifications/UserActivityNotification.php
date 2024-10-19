<?php

namespace App\Notifications;

use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserActivityNotification extends Notification
{
    use Queueable;

    protected $data; // Store dynamic data

    /**
     * Create a new notification instance.
     *
     * @param array $data Dynamic data for the notification
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param object $notifiable
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database']; // Choose the desired channels
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param object $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Admin Notification')
            ->line($this->data['body'])
            ->action('View Notification', route('admin.notifications.show', $this->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param object $notifiable
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => $this->data['title'],
            'body' => $this->data['body'],
            'icon' => $this->data['icon'],
            'url' => $this->data['url'],
        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->data['title'],
            'body' => 'New department has been created by User ' . Auth::id(), // You might want to consider revising this body
            'icon' => $this->data['icon'],
            'url' => $this->data['url'],
        ];
    }

    // public function toBroadcast($notifiable)
    // {
    //     return [
    //         'title' => 'New Admin Notification',
    //         'body' => 'This is a sample notification for the admin.',
    //     ];
    // }
}