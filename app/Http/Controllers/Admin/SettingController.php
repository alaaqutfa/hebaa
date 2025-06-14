<?php
namespace App\Http\Controllers\Admin;

use App\Models\Currency;
use Illuminate\Http\Request;

class SettingController
{
    public function index()
    {
        return view("admin.setting.index");
    }

    public function editSetting(Request $request)
    {
        saveSetting($request->key, $request->value);
        return back()->with("message", "Update success");
    }

    public function changeCurrencyRate(Request $request, Currency $currency)
    {
        $currency->update([
            'rate' => $request->rate,
        ]);

        return back()->with('success', 'The currency rate has been updated successfully.');
    }

    public function toggleCurrencyActive(Currency $currency)
    {
        $currency->update([
            'is_active' => ! $currency->is_active,
        ]);

        return back()->with('success', 'The currency status has been updated successfully.');
    }

    public function destroyCurrency(Currency $currency)
    {
        $currency->delete();

        return redirect()->route('admin.setting')->with('success', 'Currency deleted successfully.');
    }

}
