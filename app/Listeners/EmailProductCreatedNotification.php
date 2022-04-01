<?php

namespace App\Listeners;

use App\Events\EmailProductCreated;
use App\Mail\SendProductCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailProductCreatedNotification
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
     * @param  \App\Events\EmailProductCreated  $event
     * @return void
     */
    public function handle(EmailProductCreated $event)
    {
        Mail::to('admin@gmail.com')->send(new SendProductCreated($event->data));
    }
}
