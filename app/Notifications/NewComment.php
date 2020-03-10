<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Commentary;

class NewComment extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Commentary $commentary)
    {
        $this->commentary = $commentary;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->subject('Nuevo comentario')
                    ->line("Tienes un nuevo comentario de: {$this->commentary->user->name} {$this->commentary->user->lastname}")
                    ->action('Ver', route('posts.show' ,$this->commentary->post->id))
                    ->line('¡Gracias por ser parte de nuestra red!');
    }

        /**
    * Get the array representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return array
    */
    public function toArray($notifiable)
    {
        return [
            'subject' => 'ha comentado tu publicación',
            'link' => route('posts.show' ,$this->commentary->post->id),
            'username' => $this->commentary->user->name,
            'userlastname' => $this->commentary->user->lastname,
            'commentary_id' => $this->commentary->id,
            'amount' => $this->commentary->amount,
            'post_id' => $this->commentary->post->id,
        ];
    }
}
