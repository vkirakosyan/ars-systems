<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private function isAdmin()
    {
        $user = \Auth::user();

        if (is_null($user)) {
            return false;
        }

        return $user->admin == 1;
    }

    public function handle($request, Closure $next)
    {
        if(!$this->isAdmin())
        {
            abort(404);
        }
        return $next($request);
    }
}
