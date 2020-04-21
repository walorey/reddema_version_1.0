<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ImagenDeleted extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
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
                    ->subject('Eliminamos una imagen')
                    ->line('Eliminamos una imagen de la siguiente publicacion ya que viola nuestras normas:')
                    ->action('Ver publicación', route('posts.show', $this->post->slug))
                    ->line('Esperamos haya sido solo un error, nos vemos!');
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
            'subject' => 'Eliminamos una imagen',
            'link' => route('imagenEliminada.show', $this->id),
            'post' => $this->post,
            'link-post' =>  route('posts.show', $this->post->slug),
            'user' => $this->post->user
        ];
    }
}
