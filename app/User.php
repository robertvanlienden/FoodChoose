<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoleAndPermission;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'last_login', 'last_active', 'email', 'password', 'referral', 'email_optin', 'about', 'url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function meals(){
        return $this->hasMany(Meal::class);
    }

    public function weekmenus(){
        return $this->hasMany(Weekmenu::class);
    }

    public function ingredients(){
        return $this->hasMany(Ingredient::class);
    }

    public function mealCategories(){
        return $this->hasMany(MealCategory::class);
    }

    public function role(){
        return $this->hasMany(Role::class);
    }
}
