<?php
namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguagesController
{
    /**
     * عرض كل اللغات
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.setting', compact('languages'));
    }

    /**
     * عرض نموذج إنشاء لغة
     */
    public function create()
    {
        return view('admin.setting');
    }

    /**
     * حفظ اللغة الجديدة
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string',
            'code'      => 'required|string|unique:languages,code',
            'direction' => 'required|in:ltr,rtl',
        ]);

        Language::create($request->only('name', 'code', 'direction'));

        return redirect()->route('admin.setting')->with('success', 'The language has been created successfully.');
    }

    /**
     * عرض نموذج تعديل لغة
     */
    public function edit(Language $language)
    {
        return view('admin.setting', compact('language'));
    }

    /**
     * تحديث بيانات اللغة
     */
    public function update(Request $request, Language $language)
    {
        $request->validate([
            'name'      => 'required|string',
            'direction' => 'required|in:ltr,rtl',
        ]);

        $language->update($request->only('name', 'direction'));

        return redirect()->route('admin.setting')->with('success', 'The language has been updated successfully.');
    }

    /**
     * حذف لغة
     */
    public function destroy(Language $language)
    {
        $language->delete();

        return redirect()->route('admin.setting')->with('success', 'The language has been deleted.');
    }

    public function toggleActive(Language $language)
    {
        $language->update([
            'is_active' => ! $language->is_active,
        ]);

        return back()->with('success', 'The language status has been updated successfully.');
    }
}
