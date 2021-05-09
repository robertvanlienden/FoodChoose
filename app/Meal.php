<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Meal extends Model
{
    protected $fillable = ['meal_name', 'directions', 'preparation_time', 'recipe_url', 'user_id', 'public'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)
            ->withPivot('amount');
    }

    public function mealCategories()
    {
        return $this->belongsToMany(MealCategory::class, 'meal_mealCategories');
    }
}
