<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class SellerController extends Controller
{
    public function index()
    {
        return view('pages.sellers.index');
    }

    public function edit()
    {
    }
}
