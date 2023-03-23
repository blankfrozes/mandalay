<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('pages.admin.dashboard');
    }

    public function result()
    {
        return view('pages.admin.result');
    }

    public function profile()
    {
        return view('pages.admin.profile');
    }
}