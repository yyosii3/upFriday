<?php

namespace App\Http\Controllers;

class StaticPagesController extends Controller
{
    function showDisclaimer()
    {
        return view('disclaimer')->with([
            'today' => date('l'),
            'tomorrow' => date('l', mktime(0, 0, 0, date("m"), date("d")+1, date("Y")))
        ]);
    }

    function showHome()
    {
        return view('home', compact('loggedInUser'));
    }
}
