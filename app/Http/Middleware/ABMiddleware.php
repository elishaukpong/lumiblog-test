<?php

namespace App\Http\Middleware;

use App\Models\Url;
use Closure;
use Illuminate\Http\Request;

class ABMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Url::wherepath($request->getRequestUri())->exists()){
//            return [true];
        }
        return $next($request);
    }
}
