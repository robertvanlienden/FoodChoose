<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IngredientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('level:1');
    }

    public function index(Request $request){
        if($request->ajax()){
            $ingredients = Auth::user()->ingredients()->get();
            return $ingredients;
        }

        $ingredients = Auth::user()->ingredients()->paginate(10);

        return view('ingredientscontroller.index', compact('ingredients'));
    }

    public function add(){
        return view('ingredientscontroller.add');
    }

    public function edit(Ingredient $id){
        $ingredient = $id;
        $this->authorize('update', $ingredient);
        return view('ingredientscontroller.edit', compact('ingredient'));
    }

    public function patch(Ingredient $id){
        $ingredient = $id;
        $this->authorize('update', $ingredient);
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255', 'unique:ingredients,name,NULL,id,user_id,'.Auth::id()],
        ]);

        $ingredient->update([
           'name' => $data['name'],
        ]);

        return redirect('/ingredients')->with('status', 'Ingredient ' . $data['name'] . ' is aangepast');
    }

    public function store(){
        $data = request()->validate([
            'name' => [ 'required', 'string', 'max:255', 'unique:ingredients,name,NULL,id,user_id,'.Auth::id()],
        ]);

        $ingredient = Ingredient::create([
            'name' => $data['name'],
            'user_id' => Auth::id(),
        ]);

        return redirect('/ingredients')->with('status', 'Ingredient ' . $data['name'] . ' is toegevoegd');

    }

    public function delete(Ingredient $id){
        $this->authorize('delete', $id);
        $id->delete();
        return redirect('/ingredients')->with('status', 'Ingredient ' . $id['name'] . ' is verwijderd');
    }
}
