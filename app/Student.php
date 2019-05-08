<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Facades\App\number_to_ar;


class Student extends Model
{
    use LogsActivity;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';
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
    protected $fillable = ['name', 'phone', 'email', 'avatar', 'level_id', 'classroom', 'nationality', 'residence_status', 'section', 'gender', 'seatno_id', 'enrollment_status', 'school_enrollment_date', 'the_health', 'birthcertificate_enrollment_no', 'building_num', 'st_name', 'region', 'city', 'stage_year', 'birthdate', 'academic_year', 'monthly_evaluation', 'religion', 'national_id', 'parent_national_id', 'parent_phone', 'parent_email', 'parent_job', 'parent_social_status', 'parent_qualification', 'parent_name', 'fees'];

    public function currentMonthAttendencePercentage()
    {
        $from = date_create('first day of this month')->format('Y-m-d');
        $from_date = date_create_from_format('Y-m-d', $from);

        $to = date('Y-m-d');
        $to_date = date_create_from_format('Y-m-d', $to);

        $total_days = date_diff($from_date, $to_date)->d + 1;
        //dd($total_days);

        return number_format( ( $total_days - $this->absence()->whereBetween('date', [$from, $to])->get()->count() ) / $total_days * 100);
    }

    public function totalAttendencePercentage()
    {
        $from_str = $this->created_at->format('Y-m-d');
        $from_date = date_create_from_format('Y-m-d', $from_str);
        //dd($from_date);
        //$from = date('Y-m-d', $from);

        $to_str = date_create('last day of last month')->format('Y-m-d');
        $to_date = date_create_from_format('Y-m-d', $to_str);
        //dd(gettype($to_date));

        $total_days = date_diff($from_date, $to_date)->d;
        //dd($total);

        return number_format( ( $total_days - $this->absence()->whereBetween('date', [$from_str, $to_str])->get()->count() ) / $total_days * 100);
    }

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

    
    public function absence()
    {
        return $this->hasMany('App\Absence');
    }

    
    public function feesModel()
    {
        return $this->hasMany('App\Fees')->orderBy('date', 'asc');
    }
    
    
    public function level()
    {
        return $this->belongsTo('App\Level');
    }
    
    public function addOctBirthdate()
    {
        $birthdate = $this->birthdate;
        $current_year = date('Y');
        $oct_birthdate = $current_year . "-10-1";
        
        $birthdate = date_create_from_format('Y-m-d', $birthdate);
        $oct_birthdate = date_create_from_format('Y-m-d', $oct_birthdate);

        $oct_age_days = date_diff($birthdate, $oct_birthdate)->d;
        $oct_age_months = date_diff($birthdate, $oct_birthdate)->m;
        $oct_age_years = date_diff($birthdate, $oct_birthdate)->y;

        $this->setAttribute('oct_age_days', $oct_age_days);
        $this->setAttribute('oct_age_months', $oct_age_months);
        $this->setAttribute('oct_age_years', $oct_age_years);
        //dd($birthdate, $oct_birthdate, $oct_age_days, $oct_age_months, $oct_age_years);
    }

    public function addRemiderFees()
    {
        $fees = $this->feesModel;
        $fees_sum = 0;
        // dd($fees);
        foreach ($fees as $fee) {
            $fees_sum += $fee->amount;
        }
        $fees_reminder = $this->level->fees - $fees_sum;
        $this->setAttribute('fees_reminder', $fees_reminder);
        
        //dd($fees_sum, $this->level->fees, $fees_reminder);

        $fees_reminder_ar = number_to_ar::convert_number($fees_reminder, "male");
        // $waht = $fees_reminder_ar->convert_number();
        // dd($fees_reminder_ar, gettype($fees_reminder_ar));
        $this->setAttribute('fees_reminder_ar', $fees_reminder_ar. ' جنية مصري فقط لا غير');
    }

}
