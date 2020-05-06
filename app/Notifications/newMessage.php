<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class newMessage extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($destinatario, $remitente, $cuerpoMensaje)
    {
        $this->destinatario = $destinatario;
        $this->remitente = $remitente;
        $this->cuerpoMensaje = $cuerpoMensaje;
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
                    ->subject('Nuevo mensaje')
                    ->line('Tienes un nuevo mensaje de: '.$this->remitente->name.' '.$this->remitente->lastname)
                    ->action('Ver', route('verConversacion', $this->remitente->slug))
                    ->line('Gracias por utilizar Reddema!');
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
            'subject' => 'Nuevo mensaje de:'.$this->remitente->name.' '.$this->remitente->lastname,
            'remitente' => $this->remitente
        ];
    }
}
