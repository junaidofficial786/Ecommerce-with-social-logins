<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('admin.dashboard.index');
    }
}
