<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Language;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // حاول جلب كود اللغة من طلب المستخدم أو الجلسة أو استخدم "en" كافتراضي
        $code = $request->get('lang') ?? session('lang_code', 'ar');

        // جلب معلومات اللغة من قاعدة البيانات
        $language = Language::where('code', $code)->first();

        if ($language) {
            // حفظ كود اللغة والاتجاه في الجلسة
            session([
                'lang_code' => $language->code,
                'lang_direction' => $language->direction,
            ]);

            // تعيين اللغة الحالية في التطبيق
            App::setLocale($language->code);
        }

        return $next($request);
    }
}
