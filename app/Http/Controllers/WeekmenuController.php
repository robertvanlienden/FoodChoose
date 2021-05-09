<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Weekmenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeekmenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('level:1');
    }

    public function index(){
        $weekmenus = Auth::user()->weekmenus()->paginate();
        return view('weekmenucontroller.index', compact('weekmenus'));
    }

    public function view(Weekmenu $weekmenu){
        $this->authorize('view', $weekmenu);
        $meals = $weekmenu->meals()->get();
        $weekMapping = [
            'mon' => 'Maandag',
            'tue' => 'Dinsdag',
            'wed' => 'Woensdag',
            'thu' => 'Donderdag',
            'fri' => 'Vrijdag',
            'sat' => 'Zaterdag',
            'sun' => 'Zondag'
        ];

        return view('weekmenucontroller.view', compact('weekmenu', 'meals', 'weekMapping'));

    }

    public function delete(Weekmenu $weekmenu){
        $this->authorize('delete', $weekmenu);
        $weekmenu->meals()->detach();
        $weekmenu->delete();
        return redirect('/saved-weekmenu')->with('status', 'Weekmenu ' . $weekmenu['name'] . ' is verwijderd');
    }


}
