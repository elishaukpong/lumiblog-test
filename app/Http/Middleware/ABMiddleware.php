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
            dd($request);
        }

        if(Url::wherepath($request->getRequestUri())->exists()){
            $compositionService = CompositionService::initiate($request->getRequestUri());
            $nextVersion = $this->composition->findNextVersionToShow($request->getRequestUri());

            \View::share('usingABTesting', true);
            \View::share('nextVersion', $nextVersion);
        }
        return $next($request);
    }
}
