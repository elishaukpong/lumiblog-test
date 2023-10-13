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
            CompositionService::persistVariant($request);
            \View::share('compositionService', CompositionService::initiate($request->getRequestUri()));

            return $next($request);
        }

        if(Url::wherepath('faq')->exists()){
            $compositionService = CompositionService::initiate('faq');

            \View::share('compositionService', $compositionService);
        }
        return $next($request);
    }
}
