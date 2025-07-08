<?php

namespace App\Http\Middleware;

use Closure;
use http\Env;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
//        dd(session()->has('locale'));
        if (!session()->has('locale')) {
            session()->put('locale', 'tr');
        }

        //TODO add supported lang

        App::setLocale(session('locale'));
//        dd(app()->getLocale());
//        dd( App::getLocale());
        return $next($request);
    }
}
