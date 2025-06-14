<?php
namespace App\Http\Controllers\Web;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController
{
    public function switch(Request $request, $code)
    {
            $currency = Currency::where('code', $code)->first();

            if ($currency) {
                session([
                    'currency' => $currency->code,
                ]);
            }

            return redirect()->back();
    }
}
