<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ProfileController
{
    public function index() {
      $admin = auth()->user();
      return view("admin.profile.index", compact("admin"));
    }
}
