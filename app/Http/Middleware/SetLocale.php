<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->segment(1); // берем из URL первый сегмент

        if (in_array($locale, ['en', 'ru', 'kz'])) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        }

        if ($request->is('admin') || $request->is('admin/*')) {
            return $next($request); // не трогаем Filament
        }

        return $next($request);
    }
}
