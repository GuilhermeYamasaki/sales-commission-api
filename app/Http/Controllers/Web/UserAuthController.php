<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class UserAuthController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }
}
