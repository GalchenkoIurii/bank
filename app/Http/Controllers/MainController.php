<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $site_name = 'Bank'; // need retrieve from Setting model

        // need to insert via ViewComposer
        $site_settings = [];

        return view('home', compact('site_name'));
    }
}
