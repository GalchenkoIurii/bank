<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function finances()
    {
        $balance_rur = 0;
        $balance_usd = 0;
        $balance_eur = 0;
        $operations = null;


        // need to implement:
        // getting user's balances and operations


        return view(
            'finances',
            compact('balance_rur', 'balance_usd', 'balance_eur', 'operations')
        );
    }



    public function about()
    {
        $page_data = Page::where('slug', 'about')->first();
        return view('about', compact('page_data'));
    }

    public function agreement()
    {
        $page_data = Page::where('slug', 'agreement')->first();
        return view('agreement', compact('page_data'));
    }

    public function business()
    {
        $page_data = Page::where('slug', 'business')->first();
        return view('business', compact('page_data'));
    }

    public function confidentiality()
    {
        $page_data = Page::where('slug', 'confidentiality')->first();
        return view('confidentiality', compact('page_data'));
    }
}
