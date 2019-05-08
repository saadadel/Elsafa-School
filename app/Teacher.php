<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Carbon\Carbon;


class Teacher extends Model
{
    use LogsActivity;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teachers';
    
    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'national_id', 'phone', 'email', 'birthdate', 'social_status', 'qualification', 'religion', 'degree', 'subject', 'salary', 'st_name', 'building_num', 'region', 'city', 'country'];


    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }

    
    public function extras()
    {
        return $this->hasMany('App\Extra');
    }
    public function penalties()
    {
        return $this->hasMany('App\Penalty');
    }
    public function absence()
    {
        return $this->hasMany('App\Absence');
    }

    
    public function monthExtras()
    {
        $from = date_create('first day of this month')->format('Y-m-d');

        $to = date_create('last day of this month')->format('Y-m-d');

        return number_format( $this->extras()->whereBetween('date', [$from, $to])->get()->sum('amount') );
    }
    public function monthPenalties()
    {
        $from = date_create('first day of this month')->format('Y-m-d');

        $to = date_create('last day of this month')->format('Y-m-d');

        return number_format( $this->penalties()->whereBetween('date', [$from, $to])->get()->sum('amount') );
    }
}
