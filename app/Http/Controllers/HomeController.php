<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        return view('home');
    }
    function about()
    {
        return view('about');
    }
    function contact_us()
    {
        return view('contact_us');
    }
}
