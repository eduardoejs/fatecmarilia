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
        //se user->id for diferente de 1 (Admin - Default) passa a enviar os emails com as senhas
        if($event->user->id != 1){
            $password = RandomString::random();

            Mail::to($event->user->email)->queue(new NewUserWelcome($event->user, $password));

            $event->user->password = bcrypt($password);
            $event->user->save();
        }
    }
}
