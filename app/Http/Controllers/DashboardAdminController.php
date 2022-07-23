<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function informasi()
    {
        return view('admin.informasi');
    }
}
