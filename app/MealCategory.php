<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealCategory extends Model
{
    protected $table = "mealCategories";
    protected $fillable = ['category_name', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function Meals(){
        return $this->belongsToMany(Meal::class, 'meal_mealCategories');
    }
}
