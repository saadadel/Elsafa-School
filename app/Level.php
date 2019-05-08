<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['level', 'name', 'number_of_classes', 'fees'];
    
    public function students()
    {
        return $this->hasMany('App\Student');
    }
    
}
