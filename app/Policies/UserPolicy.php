<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function update(User $user, $userProfile){
        if($user->id === $userProfile->id){
            //Looks wierd? First param reffers to current user. Second to profile.
            //Idk why this works. But it works?
            return true;
        }
        return false;
    }
}
