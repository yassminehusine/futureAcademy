<?php

namespace App\Notifications;

use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {

        return ['database']; // Choose the desired channels
    }
    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
{
    return (new MailMessage)
        ->subject('New Admin Notification')
        ->line('This is a sample notification for the admin.')
        ->action('View Notification', route('admin.notifications.show', $this->id));
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

    public function toDatabase($notifiable)
{
    return [
        'title' => 'New Department Created',
        'body' => 'New department has been created by User ' . Auth::id(),
        'icon' => 'fas fa-building',
        'url' => route('department.index'),
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
