<?php

namespace App\Policies;

use App\Weekmenu;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class WeekmenuPolicy
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

    public function view(User $user, Weekmenu $weekmenu)
    {
        if($user->id == $weekmenu->user_id){
            return true;
        }
        return false;
    }

    public function update(User $user, Weekmenu $weekmenu)
    {
        if($user->id == $weekmenu->user_id){
            return true;
        }
        return false;
    }

    public function delete(User $user, Weekmenu $weekmenu)
    {
        if($user->id == $weekmenu->user_id){
            return true;
        }
        return false;
    }
}
