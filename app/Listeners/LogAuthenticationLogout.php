<?php

namespace App\Listeners;

use App\Models\Traces;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class LogAuthenticationLogout
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
    public function handle(Logout $event): void
    {
        Traces::create([
            'email'   =>   $event->user->email,
            'created_at' => now(),
            'ip'   =>   request()->ip(),
            'action'   =>   'Logout',
            'attemptPassword'   =>   null,
        ]);
    }
}
