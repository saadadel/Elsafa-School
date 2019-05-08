<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{

    protected $hidden = ['student_id', 'created_at', 'updated_at'];
    protected $fillable = ['student_id', 'date', 'amount', 'method'];
    
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
    
}
