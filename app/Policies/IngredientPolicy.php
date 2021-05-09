<?php

namespace App\Policies;

use App\Ingredient;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IngredientPolicy
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

    public function update(User $user, Ingredient $ingredient)
    {
        if($user->id == $ingredient->user_id){
            return true;
        }
        return false;
    }

    public function delete(User $user, Ingredient $ingredient)
    {
        if($user->id == $ingredient->user_id){
            return true;
        }
        return false;
    }
}
