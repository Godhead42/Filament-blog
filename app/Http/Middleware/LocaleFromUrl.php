<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class LocaleFromUrl
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);
        $nextSegment = $request->segment(2);

        // Исключаем admin и любые подмаршруты типа admin/login, admin/resources и т.п.
        if (
            ($locale === 'admin' || str_starts_with($locale, 'admin') ||
                $nextSegment === 'admin' || str_starts_with($nextSegment, 'admin'))
        ) {
            // Пропускаем админские маршруты, независимо от метода запроса
            return $next($request);
        }

        // Если первый сегмент — локаль
        if (in_array($locale, ['en', 'ru', 'kz'])) {
            app()->setLocale($locale);
        } else {
            // Только GET и HEAD запросы перенаправляем
            if (!in_array($request->method(), ['GET', 'HEAD'])) {
                return $next($request);
            }

            $defaultLocale = config('app.locale');
            return redirect("/{$defaultLocale}" . $request->getRequestUri());
        }

        return $next($request);
    }

}
