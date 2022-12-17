<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LangMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('myLocale') &&
        array_key_exists($request->session()->get('myLocale'),config('app.langs'))){
            app()->setLocale($request->session()->get('myLocale'));
        }
        else
            app()->setLocale(config('app.locale'));
        return $next($request);
    }
}
