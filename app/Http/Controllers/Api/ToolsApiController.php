<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Ingredient;
use App\Meal;
use App\MealCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ToolsApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('level:1');
    }

    public function random(Int $amount = null, String $filter = null, String $filterId = null){
        $allmeals = Auth::user()->meals;
        $allmealcount = $allmeals->count();
        $randommeal = [];
        if($filter == "category" && isset($filterId)){
            //https://medium.com/@DarkGhostHunter/laravel-has-many-through-pivot-elegantly-958dd096db
            //https://laracasts.com/discuss/channels/eloquent/filtering-belongstomany-results
            $category = MealCategory::find($filterId);
            $meals = $category->meals;
            $allmealcount = $category->meals->count();

            if($allmealcount === 0) {
                return response()->json(['message' => 'Geen maaltijd in categorie gevonden!'], 404);
            }
            $randommeal = $meals[(Rand(0, $allmealcount - 1))];

            return Response()->json($randommeal);
        }

        if($amount){
            for($i = 0; $i < $amount; $i++){
                array_push($randommeal, $allmeals[(Rand(0, $allmealcount - 1))]);
            }

            return Response()->json($randommeal);
        }
        else{
            $randommeal = $allmeals[(Rand(0, $allmealcount - 1))];
            return Response()->json($randommeal);
        }


    }

}
