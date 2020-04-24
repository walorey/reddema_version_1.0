<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommentaryDeleted extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post, $usuario)
    {
        $this->post = $post;
        $this->user = $usuario;
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
                    ->subject('Eliminamos un comentario')
                    ->line('Hemos eliminado un comentario por que no cumple con nuestras normas.')
                    ->action('Ver publicación',  route('posts.show', $this->post->slug))
                    ->line('Esperamos que haya sido solo un error, nos vemos!');
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
            'subject' => 'Eliminamos un comentario',
            'link' => route('comentarioEliminado.show', $this->id),
            'post' => $this->post,
            'link-post' =>  route('posts.show', $this->post->slug),
            'user' => $this->user
        ];
    }
}
