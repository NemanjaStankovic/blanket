<?php

namespace App\Listeners;

use App\Models\Traces;
use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogAuthenticationFailed
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
    public function handle(Failed $event): void
    {
        Traces::create([
            'email'   =>   request('email'),
            'created_at' => now(),
            'ip'   =>   request()->ip(),
            'action'   =>   'Failed',
            'attemptPassword'   =>   request('password'),
        ]);
    }
}
