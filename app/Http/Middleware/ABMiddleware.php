<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Url;
use Illuminate\Http\Request;
use App\Service\CompositionService;

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

        if($request->isPreflight()){
            //convert sessions to db using fingerprinting or google analytics - which is better
            dd($request);
        }

        if(Url::wherepath($request->getRequestUri())->exists()){
            $compositionService = CompositionService::initiate($request->getRequestUri());

            \View::share('compositionService', $compositionService);
        }
        return $next($request);
    }
}
