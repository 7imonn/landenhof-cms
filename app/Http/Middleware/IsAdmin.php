<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Http\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, $next)
    {
        /** @var User $user */
        $user = null;
        $guards = array_keys(config('auth.guards'));
        foreach ($guards as $guard) {
            if ($user = $request->user($guard)) {
                break;
            }
        }

        if ($user && $user->statamicUser()->isSuper()) {
            return $next($request);
        }

        if ($user && $user->statamicUser()->isInGroup('admin')) {
            return $next($request);
        }

        return abort(Response::HTTP_FORBIDDEN);
    }
}
