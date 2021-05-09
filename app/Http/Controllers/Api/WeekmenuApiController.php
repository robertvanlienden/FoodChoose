<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Weekmenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WeekmenuApiController extends Controller
{
    public function store() {

        $data = request()->all();
        // TODO: Think i need this later for the validation... But why should I validate? Just trow unknown error bro.

        $validator = Validator::make($data,[
            'name' => [ 'required', 'string', 'max:255', 'unique:weekmenus,name,NULL,id,user_id,'.Auth::id()],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $weekmenu = Weekmenu::create([
            'name' => $data['name'],
            'user_id' => Auth::id(),
        ]);

        $meals = array();

        foreach($data['weekmenu'] as $day => $data){
            $meals = array_merge($meals, array(array('meal_id' => $data['id'],
                    'day' => $day,))
            );
        }

        $weekmenu->Meals()->sync($meals);

        return response()->json($weekmenu, 201);

    }

    //TODO: This down here
    public function index() {

    }

    public function view() {

    }

    public function delete() {

    }
}
