<?php

namespace App\Listeners;

use App\Notifications\SendWelcomeEmailNotification;
use App\Events\NewUserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\User;

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
     * @param  NewUserRegistered  $event
     * @return void
     */
    public function handle(NewUserRegistered $event)
    {
        //send the welcome email to the user
        $event->user->notify(
            new SendWelcomeEmailNotification()
        );
    }
}
