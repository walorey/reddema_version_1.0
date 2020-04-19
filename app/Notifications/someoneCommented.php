<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class someoneCommented extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comentario)
    {
        $this->comentario = $comentario;
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
                    ->subject('Han comentado una publicación')
                    ->line($this->comentario->user->name.' '.$this->comentario->user->lastname.' comentó la publicación de: '.$this->comentario->post->user->name.' '.$this->comentario->post->user->lastname)
                    ->action('Ver', route('posts.show' ,$this->comentario->post->slug))
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
            'subject' => $this->comentario->user->name . " " . $this->comentario->user->lastname ." "."tambien comentó la publicación de: ".$this->comentario->post->user->name.' '.$this->comentario->post->user->lastname,
            'link' => route('posts.show' ,$this->comentario->post->slug),
            'commentary_id' => $this->comentario->id,
            'amount' => $this->comentario->amount,
            'post_id' => $this->comentario->post->id,
        ];
    }
}
