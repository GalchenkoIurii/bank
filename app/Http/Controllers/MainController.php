<?php

namespace App\Http\Controllers;

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
}
