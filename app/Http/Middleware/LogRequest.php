<?php

namespace App\Http\Middleware;

use App\Http\LogUtility;
use App\Log;
use Closure;
use Illuminate\Support\Facades\Auth;

class LogRequest
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

//        return $next($request);
        $response  = $next($request);
        $user = 'public';
        if(Auth::user()){
            $user = Auth::user()->email;
        }
        LogUtility::insertLog(
            'Request on ' . $request->fullUrl(),
            $user
        );
        return $response;
    }
}
