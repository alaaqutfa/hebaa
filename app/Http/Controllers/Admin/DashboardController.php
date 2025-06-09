<?php
namespace App\Http\Controllers\Admin;

class DashboardController
{
    public function index()
    {
        // isAdmin();
        return view("admin.dashboard");
    }
}
