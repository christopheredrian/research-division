<?php

namespace App\Http\Middleware;

use App\Http\LogUtility;
use App\Log;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;


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
        $url = $request->fullUrl();
        $ip = Request::ip();
        LogUtility::insertLog(
            "User went to $url",
            $user
        );
        return $response;
    }
}
