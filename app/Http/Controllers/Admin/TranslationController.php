<?php
namespace App\Http\Controllers\Admin;

use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController
{
    public function edit($locale)
    {
        $translations = Translation::where('locale', $locale)->orderBy('id', 'desc')->paginate(50);
        return view('admin.languages.edit', compact('locale', 'translations'));
    }

    public function update(Request $request, $locale, $key)
    {
        Translation::updateOrCreate(
            ['locale' => $locale, 'key' => $key],
            ['value' => $request->input('value')]
        );

        return redirect()->route('admin.translations.edit', ['locale' => $locale, 'page' => $request->input('page', 1)])
            ->with('success', 'The translation has been successfully updated.');

    }

    public function destroy($id)
    {
        $translation = Translation::findOrFail($id);
        $locale      = $translation->locale;
        $translation->delete();

        return redirect()
            ->route('admin.translations.edit', ['locale' => $locale, 'page' => request('page', 1)])
            ->with('success', 'Translation deleted successfully.');
    }
}
