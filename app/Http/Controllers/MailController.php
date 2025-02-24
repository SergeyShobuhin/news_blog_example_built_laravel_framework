<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
        return view('mail');

    }

}
