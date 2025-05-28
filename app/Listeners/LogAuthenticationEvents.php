<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;


class LogAuthenticationEvents
{
    public function handle($event)
    {
        if ($event instanceof Login) {
            activity()
                ->causedBy($event->user)
                ->withProperties([
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                ])
                ->log('User logged in');
        } elseif ($event instanceof Logout) {
            activity()
                ->causedBy($event->user)
                ->withProperties([
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                ])
                ->log('User logged out');
        }
    }
}
