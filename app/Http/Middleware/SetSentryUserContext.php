<?php

namespace App\Http\Middleware;

use Closure;
use Sentry\State\Scope;

use function Sentry\configureScope;

class SetSentryUserContext
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        foreach (config('auth.guards') as $guardName => $config) {
            if (! $user = auth($guardName)->user()) {
                continue;
            }

            if ($user && app()->bound('sentry')) {
                configureScope(function (Scope $scope) use ($user): void {
                    $scope->setUser([
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                    ]);
                });
            }

            break;
        }

        return $next($request);
    }
}
