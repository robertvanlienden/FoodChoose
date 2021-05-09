<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameMealCategoriesTableToMealCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('meal_categories', 'mealCategories');
        Schema::rename('meal_meal_categories', 'meal_mealCategories');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('mealCategories', 'meal_categories');
        Schema::rename('meal_mealCategories', 'meal_meal_categories');
    }
}
