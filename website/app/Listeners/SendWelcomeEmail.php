<?php

namespace App\Listeners;

use App\Classes\RandomString;
use App\Events\NewUser;
use App\Models\Admin\Users\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\NewUserWelcome;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewUser  $event
     * @return void
     */
    public function handle(NewUser $event)
    {
        // Se user->id for diferente de 1 (Admin - Default) passa a enviar os emails com as senhas
        if($event->user->id != 1){

            // Gera uma senha aleatória
            $password = RandomString::random();

            // Envia email passando o user e password gerada para a classe Mailable NewUserWelcome
            Mail::to($event->user->email)->queue(new NewUserWelcome($event->user, $password));

            // Após o envio do email, a senha gerada aleatoriamente é criptografada e salva no banco de dados
            $event->user->password = bcrypt($password);
            $event->user->save();
        }
    }
}
