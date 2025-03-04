<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class MyController extends Controller
{
    public function index()
    {
//        dd('asdsadsa');
        return view('admin.index');
    }
}
