<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changelog()
    {
        return view('pagecontroller.changelog');
    }

    public function termsAndConditions()
    {
        return view('pagecontroller.terms-and-conditions');
    }

}
