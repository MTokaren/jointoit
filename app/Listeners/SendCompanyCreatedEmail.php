<?php

namespace App\Listeners;

use App\Events\CompanyCreated;
use App\Mail\NewCompanyMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendCompanyCreatedEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CompanyCreated $event): void
    {
        Mail::to('matvey.tokarenko@gmail.com')->send(new NewCompanyMail($event->company));
    }
}
