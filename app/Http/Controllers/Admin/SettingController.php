<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class SettingController
{
    public function editHero(Request $request) {
      saveSetting($request->key, $request->value);
      return back()->with("message","Update success");
    }
}
