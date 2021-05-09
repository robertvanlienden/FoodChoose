<?php

namespace App\Http\Controllers\Api;

use App\Ingredient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class IngredientsApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('level:1');
    }

    public function index(){
            $ingredients = Auth::user()->ingredients()->get();
            return $ingredients;
    }

    public function patch(Ingredient $id){
        $ingredient = $id;
        $this->authorize('update', $ingredient);

        $data = request()->all();

        $validator = Validator::make($data,[
            'name' => [ 'required', 'string', 'max:255', 'unique:ingredients,name,NULL,id,user_id,'.Auth::id()],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

         $ingredient->update([
            'name' => $data['name'],
        ]);

        return Response()->json($ingredient, 200);
    }

    public function store(){

        $data = request()->all();

        $validator = Validator::make($data,[
            'name' => [ 'required', 'string', 'max:255', 'unique:ingredients,name,NULL,id,user_id,'.Auth::id()],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $ingredient = Ingredient::create([
            'name' => $data['name'],
            'user_id' => Auth::id(),
        ]);

        return response()->json($ingredient, 201);
    }

    public function delete(Ingredient $id){
        $this->authorize('delete', $id);
        $id->delete();
        return response()->json(null, 204);
    }
}
