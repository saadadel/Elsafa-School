<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Teacher;
use App\Student;
use Facades\App\Our_Helpers;

class PromotionsController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        $students = Student::all();

        //dd($students);

        return view('admin.promotions', compact('teachers', 'students'));
    }

    public function studentsUp(Request $request)
    {
        //dd($request->students_ids[0]);
        if($request->pro_type == 'student')
        {
            Our_Helpers::modelsUp(Student::class, $request->students_ids);
        }

        return response()->json('DONE');
    }
    
}
