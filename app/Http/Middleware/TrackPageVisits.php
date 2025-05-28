<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class TrackPageVisits
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            activity()
                ->causedBy(auth()->user())
                ->withProperties([
                    'url' => $request->fullUrl(),
                    'method' => $request->method(),
                    'ip_address' => $request->ip(),
                ])
                ->event('page_visited')
                ->log('Visited page');
        }

        return $next($request);
    }
}
