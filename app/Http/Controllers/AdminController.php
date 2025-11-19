<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.admin');
        
    } 
    public function detail()
    {
        return view('admin.detail.show');
    }
}
