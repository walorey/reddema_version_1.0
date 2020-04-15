<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReportResolved extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($report, $solucion)
    {
        $this->report = $report;
        $this->solucion = $solucion;
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
                    ->line('Hola! Revisamos tu reporte: "'.$this->report->title.'"')
                    ->line('Devolución: '.$this->solucion)
                    ->action('ver en Reddema', route('notifications.reporteResuelto' ,$this->id))
                    ->line('Gracias por colaborar con Reddema!');
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
            'subject' => 'Revisamos tu reporte: "'.$this->report->title.'"',
            'link' => route('notifications.reporteResuelto' ,$this->id),
            'user' => $this->report->accuser,
            'solucion' => $this->solucion,
        ];
    }
}
