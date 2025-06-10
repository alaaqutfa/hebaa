<?php
namespace App\Http\Controllers\Web;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguagesController
{
    public function index()
    {
        // عرض جميع اللغات
        $languages = Language::all();
        return view('languages.index', compact('languages'));
    }

    public function switch(Request $request, $code)
    {
            // تحقق من وجود اللغة
            $language = Language::where('code', $code)->first();

            if ($language) {
                session([
                    'lang_code'      => $language->code,
                    'lang_direction' => $language->direction,
                ]);

                app()->setLocale($language->code);
            }

            return redirect()->back();
    }
}
