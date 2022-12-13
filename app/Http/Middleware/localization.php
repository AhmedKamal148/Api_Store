<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class localization
{

    public function handle(Request $request, Closure $next)
    {

        if ($request->header('lang') == 'ar') {
            App::setLocale('ar');
        } else {
            App::setLocale('en');
        }

        return $next($request);
    }
}
