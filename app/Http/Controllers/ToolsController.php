<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToolsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('level:1');
    }

    public function randommeal()
    {
        $allmeals = Auth::user()->meals;

        $allmealcount = $allmeals->count();

        $randommeal = $allmeals[(Rand(0, $allmealcount - 1))];

        return view('tools.randommeal', compact('randommeal'));
    }

    public function weekPlanner(){
        $apiToken = Auth::user()->api_token;

        return view('tools.weekplanner', compact('apiToken'));
    }
}
