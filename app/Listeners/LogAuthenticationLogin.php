<?php

namespace App\Listeners;

use App\Models\Traces;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;


class LogAuthenticationLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    public function handle(Login $event): void
    {
        Traces::create([
            'email'   =>   $event->user->email,
            'created_at' => now(),
            'ip'   =>   request()->ip(),
            'action'   =>   'Login',
            'attemptPassword'   =>   null,
        ]);
    }
}
