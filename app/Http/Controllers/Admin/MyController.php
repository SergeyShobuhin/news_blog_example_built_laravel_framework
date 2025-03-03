<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class MyController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
