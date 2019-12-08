<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class Locale
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
        $locale = $request->session()->get('locale');
        if(!in_array($locale, config('app.locales'))) {
            $locale = config('app.locale');
        }
        App::setLocale($locale);
        return $next($request);
    }
}
