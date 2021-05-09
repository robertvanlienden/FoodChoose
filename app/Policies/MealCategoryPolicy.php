<?php

namespace App\Policies;

use App\MealCategory;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MealCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, MealCategory $mealCategory)
    {
        if($user->id == $mealCategory->user_id){
            return true;
        }
        return false;
    }

    public function update(User $user, MealCategory $mealCategory)
    {
        if($user->id == $mealCategory->user_id){
            return true;
        }
        return false;
    }

    public function delete(User $user, MealCategory $mealCategory)
    {
        if($user->id == $mealCategory->user_id){
            return true;
        }
        return false;
    }

}
