<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PostDeleted extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($titlePost,$motivo, $user)
    {
        $this->titlePost = $titlePost;
        $this->motivo = $motivo;
        $this->user = $user;
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
                    ->subject('Aviso del equipo de Reddema')
                    ->line('Hemos eliminado tu publicación "'.$this->titlePost.'" por el siguiente motivo:')
                    ->line($this->motivo)
                    ->line('Puedes seguir usando Reddema, pero revisa siempre el contenido que compartes');
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
            'subject' => 'Hemos eliminado tu publicación: '.$this->titlePost,
            'link' => route('notifications.show' ,$this->id),
            'user' => $this->user,
            'motivo' => $this->motivo,
        ];
    }
}
