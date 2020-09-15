<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetDeSenha extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
	public function __construct($token)
	{
		$this->token = $token;
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
        //Define a msg para o usuário resetar a senha
        return (new MailMessage)
            ->from('lizardtech.corp@gmail.com', "Lizard - Teacher's Room")
			->subject('Recuperar senha')
			->greeting('Olá, tudo bem?')
			->line('Você está recebendo esse e-mail para sua recuperação de senha, por favor acesse o link abaixo:')
			->action('REDEFINIR SENHA', route('password.reset', $this->token))
			->line('Caso não tenha requisitado uma nova senha, favor ignorar este e-mail.');
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
