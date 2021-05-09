<?php

namespace App\Policies;

use App\Meal;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MealPolicy
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

    public function view(?User $user, Meal $meal)
    {
        if($meal->public == 1 && $meal->user()->get()->first()->username ||
            isset($user->id) && $user->id == $meal->user_id){
            return true;
        }

        return false;
    }

    public function update(User $user, Meal $meal)
    {
        if($user->id == $meal->user_id){
            return true;
        }
        return false;
    }

    public function delete(User $user, Meal $meal)
    {
        if($user->id == $meal->user_id){
            return true;
        }
        return false;
    }

}
