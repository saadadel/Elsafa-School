<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Parent_;
use App\Teacher;
use App\Student;

class Our_Helpers
{
    public function modelsCMAP($models)
    {
        //dd($models);
        foreach ($models as $model) 
        {
            $atend_perc = $this->currentMonthAttendencePercentage($model);
            $model->setAttribute('month_attendence', $atend_perc);
        }
        //dd($models);
    }
    public function modelsTAP($models)
    {
        //dd($models);
        foreach ($models as $model) 
        {
            $atend_perc = $this->totalAttendencePercentage($model);
            $model->setAttribute('total_attendence', $atend_perc);
        }
        //dd($models);
    }
    public function modelsAge($models)
    {
        //dd($models);
        foreach ($models as $model) 
        {
            $age = $this->birthdateToAge($model);
            $model->setAttribute('age', $age);
        }
        //dd($models);
    }
    public function totalSalary($model)
    {
        $from = date_create('first day of this month')->format('Y-m-d');
        //$from = date('Y-m-d', $from);

        $to = date_create('last day of this month')->format('Y-m-d');
        //$to = date('Y-m-d', $to);
        //dd($from, $to, $this->extras()->whereBetween('date', [$from, $to])->get()->sum('amount'));
        return $model->salary +
        $model->extras()->whereBetween('date', [$from, $to])->get()->sum('amount') -
        $model->penalties()->whereBetween('date', [$from, $to])->get()->sum('amount');
    }

    public function currentMonthAttendencePercentage($model)
    {
        $from = date_create('first day of this month')->format('Y-m-d');
        $from_date = date_create_from_format('Y-m-d', $from);

        $to = date('Y-m-d');
        $to_date = date_create_from_format('Y-m-d', $to);

        $total_days = date_diff($from_date, $to_date)->d + 1;
        //dd($total_days);

        return number_format( ( $total_days - $model->absence()->whereBetween('date', [$from, $to])->get()->count() ) / $total_days * 100);
    }

    public function totalAttendencePercentage($model)
    {
        $from_str = $model->created_at->format('Y-m-d');
        $from_date = date_create_from_format('Y-m-d', $from_str);
        //dd($from_date);
        //$from = date('Y-m-d', $from);

        $to_str = date_create('last day of last month')->format('Y-m-d');
        $to_date = date_create_from_format('Y-m-d', $to_str);
        //dd(gettype($to_date));

        $total_days = date_diff($from_date, $to_date)->d;
        //dd($total);

        return number_format( ( $total_days - $model->absence()->whereBetween('date', [$from_str, $to_str])->get()->count() ) / $total_days * 100);
    }

    public function birthdateToAge($model)
    {
        return Carbon::parse($model->birthdate)->age;
    }

    public function modelsUp($model, $ids)
    {
        if($model == "App\Teacher")
        {
            dd("teacher", Teacher::find($ids[0]));
        }
        elseif($model == "App\Student")
        {
            foreach ($ids as $id) {
                $student = Student::find($id);
                //dd($student);
                $this->studentUp($student);
            }
        }
    }
    public function studentUp($student)
    {
        if($student->level->level == 'الروضة')
        {
            if($student->level->name == 'الصف الاول')
            {
                $student->level->name = 'الصف الثاني';
            }
            elseif($student->level->name == 'الصف الثاني')
            {
                $student->level->level = 'الإبتدائي';
                $student->level->name = 'الصف الاول';
            }
        }
        elseif($student->level->level == 'الابتدائي')
        {
            if($student->level->name == 'الصف الاول')
            {
                $student->level->name = 'الصف الثاني';
            }
            elseif($student->level->name == 'الصف الثاني')
            {
                $student->level->name = 'الصف الثالث';
            }
            elseif($student->level->name == 'الصف الثالث')
            {
                $student->level->name = 'الصف الرابع';
            }
            elseif($student->level->name == 'الصف الرابع')
            {
                $student->level->name = 'الصف الخامس';
            }
            elseif($student->level->name == 'الصف الخامس')
            {
                $student->level->name = 'الصف السادس';
            }
            elseif($student->level->name == 'الصف السادس')
            {
                $student->level->level = 'الإعدادي';
                $student->level->name = 'الصف الاول';
            }
        }

        elseif($student->level->level == 'الإعدادي')
        {
            if($student->level->name == 'الصف الاول')
            {
                $student->level->name = 'الصف الثاني';
            }
            elseif($student->level->name == 'الصف الثاني')
            {
                $student->level->name = 'الصف الثالث';
            }
            elseif($student->level->name == 'الصف الثالث')
            {
                $student->level->level = 'الثانوي';
                $student->level->name = 'الصف الاول';
            }
        }
        elseif($student->level->level == 'الثانوي')
        {
            if($student->level->name == 'الصف الاول')
            {
                $student->level->name = 'الصف الثاني';
            }
            elseif($student->level->name == 'الصف الثاني')
            {
                $student->level->name = 'الصف الثالث';
            }
        }
        $student->save();
    }
}