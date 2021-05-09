<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['name', 'user_id'];

    public function meals(){
        return $this->belongsToMany(Meal::class)
            ->withPivot('amount');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
