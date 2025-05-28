<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;



class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\LogAuthenticationEvents',
        ],
        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\LogAuthenticationEvents',
        ],
    ];

    public function boot(): void
    {
        //
    }
}
