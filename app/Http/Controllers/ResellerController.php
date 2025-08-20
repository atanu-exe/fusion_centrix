<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResellerController extends Controller
{
    function index()
    {
        return view('resellers');
    }
}
