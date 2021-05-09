<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Str;

class ApiToken
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
        $response = $next($request);

        if(!isset(Auth::user()->api_token) && !Auth::guest()){
            $request->user()->api_token = Str::random(60);
            $request->user()->save();
        }

        return $response;
    }
}
