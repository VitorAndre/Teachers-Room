<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MetodologiaNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {  
        //Define a mensagem que será enviada aos admins para requisitar novas metodologias
        return (new MailMessage)
            ->from('lizardtech.corp@gmail.com', "Lizard - Teacher's Room")
			->subject('Há novas requisições de metodologias')
			->greeting('Olá, tudo bem?')
			->line('Você está recebendo esse e-mail para checar novas requisições de metodologias, por favor acesse o link abaixo:')
			->action('Novas requisições de metodologia', url('/requisicao_metodologia'))
			->line('Caso não seja um admin do Teachers Room, favor ignorar este e-mail.');
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
            //
        ];
    }
}
