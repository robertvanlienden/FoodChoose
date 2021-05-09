<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Meal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'view']);
        $this->middleware('level:1', ['except' => 'view']);
    }

    public function index(Request $request){

        $meals = $this->sort('meal_name');
        $preparationTimeSortUrlParameters = $this->getSortUrlParameters('preparation_time', $request);
        $mealNameSortUrlParameters = $this->getSortUrlParameters('meal_name', $request);

        if($request->input('search_input')){
            $meals = $this->search($request->input('search_input'), 'meal_name');
        }
        if($request->input('search_input') && $request->input('search_on')){
            $meals = $this->search(
                $request->input('search_input'),
                $request->input('search_on')
            );
        }

        if($request->input('sort_by') && $request->input('sort_type')){
            $meals = $this->sort(
                $request->input('sort_by'),
                $request->input('sort_type')
            );
                $mealNameSortUrlParameters = $this->getSortUrlParameters($request->input('sort_by'),
                $request,
                $request->input('sort_type'));
            $preparationTimeSortUrlParameters = $this->getSortUrlParameters('preparation_time', $request, $request->input('sort_type'));
            $mealNameSortUrlParameters = $this->getSortUrlParameters('meal_name', $request, $request->input('sort_type'));
        }

        $meals = $meals->paginate()->appends(request()->except('page'));

        return view('mealscontroller.index', compact(
            'meals',
                    'mealNameSortUrlParameters',
                    'preparationTimeSortUrlParameters'
        ));
    }

    public function view(Meal $id){
        $meal = $id;
        $this->authorize('view', $meal);
        $ingredients = $meal->ingredients()->get();
        $mealCategories = $meal->mealCategories()->get();

        return view('mealscontroller.view', compact('meal', 'ingredients', 'mealCategories'));
    }

    public function add(){
        $mealCategories = Auth::user()->mealCategories()->get();
        $apiToken = Auth::user()->api_token;
        return view('mealscontroller.add', compact('apiToken', 'mealCategories'));
    }

    public function store(){
        $data = request()->validate([
            'meal_name' => ['required', 'string', 'max:255'],
            'mealCategories' => ['nullable', 'int'],
            'directions' => ['nullable', 'string'],
            'preparation_time' => ['nullable', 'int', 'min:0', 'max:300'],
            'recipe_url' => ['nullable', 'url', 'max:255'],
            'public' => ['boolean'],
            'ingredients' => ['array'],
            'ingredientsamount' => ['array'],
        ]);

        $data['public'] = (isset($data['public']) && $data['public'] === '1') ? 1 : 0;

        $meal = Meal::create([
            'user_id' => Auth::id(),
            'meal_name' => $data['meal_name'],
            'directions' => $data['directions'],
            'preparation_time' => $data['preparation_time'],
            'recipe_url' => $data['recipe_url'],
            'public' => $data['public'],
        ]);

        if(isset($data['ingredients']) && !empty($data['ingredients'])){
            foreach($data['ingredients'] as $ingredient){
                $data['ingredients'][$ingredient] = ['amount' => $data['ingredientsamount'][$ingredient]];
            }
            $meal->ingredients()->sync($data['ingredients']);
        }

        if(isset($data['mealCategories']) && !empty($data['mealCategories'])){
            $meal->mealCategories()->attach($data['mealCategories']);
        }

        return redirect('/meals')->with('status', 'Recept ' . $data['meal_name'] . ' is toegevoegd');
    }

    public function edit(Meal $id){
        $meal = $id;
        $this->authorize('update', $meal);
        $mealCategories = Auth::user()->mealCategories()->get();
        $apiToken = Auth::user()->api_token;

        return view('mealscontroller.edit',
            compact('meal',
            'apiToken',
                'mealCategories'
                )
        );
    }

    public function patch(Meal $id){
        $meal = $id;
        $this->authorize('update', $meal);
        $data = request()->validate([
            'meal_name' => ['required', 'string', 'max:255'],
            'mealCategories' => ['nullable', 'int'],
            'directions' => ['nullable', 'string'],
            'preparation_time' => ['nullable', 'int', 'min:0', 'max:300'],
            'recipe_url' => ['nullable', 'url', 'max:255'],
            'public' => ['boolean'],
            'ingredients' => ['array'],
            'ingredientsamount' => ['array'],
        ]);

        $data['public'] = (isset($data['public']) && $data['public'] === '1') ? 1 : 0;

        $meal->update([
            'meal_name' => $data['meal_name'],
            'directions' => $data['directions'],
            'preparation_time' => $data['preparation_time'],
            'public' => $data['public'],
        ]);

        if(isset($data['ingredients']) && !empty($data['ingredients'])){
            foreach($data['ingredients'] as $ingredient){
                $data['ingredients'][$ingredient] = ['amount' => $data['ingredientsamount'][$ingredient]];
            }
            $meal->ingredients()->sync($data['ingredients']);
        }
        else{
            $meal->ingredients()->detach();
        }

        if(isset($data['mealCategories']) && !empty($data['mealCategories'])){
                        $meal->mealCategories()->sync($data['mealCategories']);
        }
        else{
            $meal->mealCategories()->detach();
        }

        return redirect('/meals')->with('status', 'Recept ' . $data['meal_name'] . ' is aangepast');
    }

    public function delete(Meal $id){
        $this->authorize('delete', $id);
        $id->ingredients()->detach();
        $id->delete();
        return redirect('/meals')->with('status', 'Recept ' . $id['meal_name'] . ' is verwijderd');
    }

    private function search(string $input, string $searchOn){
        if($input && $searchOn === 'meal_name'){
            $meals = Auth::user()->meals()->where('meal_name', 'like' , '%' .$input. '%');

            return $meals;
        }

        if($input && $searchOn === 'category_name'){
            $meals = Auth::user()->meals()->whereHas('mealCategories', function ($mealCategories) use ($input) {
                $mealCategories->where('category_name', 'like', '%' . $input . '%');
            });

            return $meals;
        }

    }

    private function sort(string $sortBy, string $sortType = 'asc'){
        if($sortBy && $sortType == 'asc') {
            $meal = Auth::user()->meals()->orderBy($sortBy);
            return $meal;
        }
        if($sortBy && $sortType == 'desc'){
            $meal = Auth::user()->meals()->orderByDesc($sortBy);
            return $meal;
        }
    }

    private function getSortUrlParameters(string $sortBy, Request $request, string $sortType = 'desc'){
        $output = array_merge($request->all(), ['sort_by' => $sortBy, 'sort_type' => 'asc']);
        if($sortType == 'asc'){
            $output = array_merge($request->all(), ['sort_by' => $sortBy, 'sort_type' => 'desc']);
        }
        return $output;
    }

}
