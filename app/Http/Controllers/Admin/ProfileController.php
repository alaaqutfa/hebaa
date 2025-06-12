<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ProfileController
{
    public function index() {
      $user = auth()->user();
      return view("admin.profile.index", compact("user"));
    }
}
