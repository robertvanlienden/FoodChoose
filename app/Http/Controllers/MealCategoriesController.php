<?php

namespace App\Http\Controllers;

use App\MealCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mealCategories = Auth::user()->mealCategories()->paginate(10);

        return view('mealcategoriescontroller.index', compact('mealCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mealcategoriescontroller.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'category_name' => [ 'required', 'string', 'max:255', 'unique:mealCategories,category_name,NULL,id,user_id,'.Auth::id()],
        ]);

        $category = MealCategory::create([
            'category_name' => $data['category_name'],
            'user_id' => Auth::id(),
        ]);

        return redirect('/mealcategories')
            ->with('status', 'Recept categorie ' . $data['category_name'] . ' is toegevoegd');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MealCategory  $mealCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(MealCategory $mealCategory)
    {
        $this->authorize('update', $mealCategory);
        return view('mealcategoriescontroller.edit', compact('mealCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MealCategory  $mealCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MealCategory $mealCategory)
    {
        $this->authorize('update', $mealCategory);

        $data = request()->validate([
            'category_name' => ['required', 'string', 'max:255', 'unique:mealCategories,category_name,NULL,id,user_id,'.Auth::id()],
        ]);

        $mealCategory->update([
            'category_name' => $data['category_name'],
        ]);

        return redirect('/mealcategories')
            ->with('status', 'Recept categorie ' . $data['category_name'] . ' is aangepast');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MealCategory  $mealCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(MealCategory $mealCategory)
    {
        $this->authorize('delete', $mealCategory);
        $mealCategory->delete();

        return redirect('/mealcategories')
            ->with('status', 'Recept categorie ' . $mealCategory['category_name'] . ' is verwijderd');
    }
}
