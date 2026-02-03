<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        return view('be-pages.dashboard', [
            'title' => 'Dashboard Admin',
        ]);
    }
}
