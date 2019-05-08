<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Student;
use App\Level;
use App\Extra;
use App\Fees;
use App\Absence;
use App\Teacher;
use Session;


class ReportsController extends Controller
{
    public function index()
    {
        $current_day = date('d');
        $current_month = date('m');
        $current_year = date('Y');

        return view('admin.reports', compact('current_day', 'current_month', 'current_year'));
    }

    public function generate(Request $request)
    {
        //dd($request->all());
        if($request->section == 'students')
        {
            if($request->type == 'all')
            {
                $level_compact = 'الكل'; $level_section = 'الكل'; $classroom = 'الكل'; $section = 'الكل'; $academic_year = 'الكل';
                $students = Student::all();
                foreach ($students as $student) {
                    $student->addOctBirthdate();
                }

                return view('admin.reports.classroom', compact('level_compact', 'level_section', 'classroom', 'section', 'academic_year', 'students'));
            }
            elseif ($request->type == 'schoolrec') 
            {
                if($request->filled('school_section')){$section = $request->school_section;}
                else{$section = 'الكل';}
                
                if ($request->filled('level') && $request->filled('level_name')) 
                {
                    $level = Level::where('level', 'like', $request->level)
                            ->where('name', 'like', $request->level_name)->first();
                    // dd($level);
                    $level_compact = $level->level; $level_section = $level->name;
                    
                    if ($request->filled('classroom')) 
                    {
                        $classroom = $request->classroom;
                        if($request->filled('academic_year'))
                        {
                            $academic_year = $request->academic_year;
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('level_id', $level->id)
                            ->where('classroom', $request->classroom)
                            ->where('academic_year', 'like', $request->academic_year)->get();
                        }
                        else
                        {
                            $academic_year = 'الكل';
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('level_id', $level->id)
                            ->where('classroom', $request->classroom)->get();
                        }
                    }
                    else
                    {
                        $classroom = 'الكل';
                        if($request->filled('academic_year'))
                        {
                            $academic_year = $request->academic_year;
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('level_id', $level->id)
                            ->where('academic_year', 'like', $request->academic_year)->get();
                        }
                        else
                        {
                            $academic_year = 'الكل';
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('level_id', $level->id)->get();
                        }
                    }
                }
                else
                {
                    $level_compact = 'الكل'; $level_section = 'الكل';
                    if ($request->filled('classroom'))
                    {
                        $classroom = $request->classroom;
                        if($request->filled('academic_year'))
                        {
                            $academic_year = $request->academic_year;
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('classroom', $request->classroom)
                            ->where('academic_year', 'like', $request->academic_year)->get();
                        }
                        else
                        {
                            $academic_year = 'الكل';
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('classroom', $request->classroom)->get();
                        }
                    }
                    else
                    {
                        $classroom = 'الكل';
                        if($request->filled('academic_year'))
                        {
                            $academic_year = $request->academic_year;
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('academic_year', 'like', $request->academic_year)->get();
                        }
                        else
                        {
                            $academic_year = 'الكل';
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')->get();
                        }
                    }
                }
                
                foreach ($students as $student) {
                    $student->addOctBirthdate();
                }

                return view('admin.reports.classroom', compact('level_compact', 'level_section', 'classroom', 'section', 'academic_year', 'students'));
            }
            elseif ($request->type == 'payment_receipt') 
            {
                if($request->filled('school_section')){$section = $request->school_section;}
                else{$section = 'الكل';}
                
                if ($request->filled('level') && $request->filled('level_name')) 
                {
                    $level = Level::where('level', 'like', $request->level)
                            ->where('name', 'like', $request->level_name)->first();
                    // dd($level);
                    $level_compact = $level->level; $level_section = $level->name;
                    
                    if ($request->filled('classroom')) 
                    {
                        $classroom = $request->classroom;
                        if($request->filled('academic_year'))
                        {
                            $academic_year = $request->academic_year;
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('level_id', $level->id)
                            ->where('classroom', $request->classroom)
                            ->where('academic_year', 'like', $request->academic_year)->get();
                        }
                        else
                        {
                            $academic_year = 'الكل';
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('level_id', $level->id)
                            ->where('classroom', $request->classroom)->get();
                        }
                    }
                    else
                    {
                        $classroom = 'الكل';
                        if($request->filled('academic_year'))
                        {
                            $academic_year = $request->academic_year;
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('level_id', $level->id)
                            ->where('academic_year', 'like', $request->academic_year)->get();
                        }
                        else
                        {
                            $academic_year = 'الكل';
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('level_id', $level->id)->get();
                        }
                    }
                }
                else
                {
                    $level_compact = 'الكل'; $level_section = 'الكل';
                    if ($request->filled('classroom'))
                    {
                        $classroom = $request->classroom;
                        if($request->filled('academic_year'))
                        {
                            $academic_year = $request->academic_year;
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('classroom', $request->classroom)
                            ->where('academic_year', 'like', $request->academic_year)->get();
                        }
                        else
                        {
                            $academic_year = 'الكل';
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('classroom', $request->classroom)->get();
                        }
                    }
                    else
                    {
                        $classroom = 'الكل';
                        if($request->filled('academic_year'))
                        {
                            $academic_year = $request->academic_year;
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('academic_year', 'like', $request->academic_year)->get();
                        }
                        else
                        {
                            $academic_year = 'الكل';
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')->get();
                        }
                    }
                }
                
                foreach ($students as $student) {
                    $student->addRemiderFees();
                }

                return view('admin.reports.payment_receipt', compact('level_compact', 'level_section', 'classroom', 'section', 'academic_year', 'students'));
            }
            elseif ($request->type == 'residence')
            {
                if($request->filled('residence_status'))
                {
                    $residence_status = $request->residence_status;
                    if($request->filled('school_section'))
                    {
                        $school_section = $request->school_section;
                        $students = Student::where('residence_status', $request->residence_status)
                                    ->where('section', $request->school_section)->get();
                    }
                    else
                    {
                        $school_section = 'الكل';
                        $students = Student::where('residence_status', $request->residence_status)->get();
                    }
                    return view('admin.reports.residence', compact('residence_status', 'school_section', 'students'));
                }
                else
                {
                    Session::flash('error', 'يجب اختيار حالة الإقامة');
                    return back();
                }
            }
            elseif ($request->type == 'religion')
            {
                if($request->filled('religion_select'))
                {
                    $religion = $request->religion_select;
                    $students = Student::where('religion', $request->religion_select)->get();
                    return view('admin.reports.religion', compact('religion', 'students'));
                }
                else
                {
                    Session::flash('error', 'يجب اختيار الديانة');
                    return back();
                }
            }
            elseif ($request->type == 'stats')
            {
                if($request->filled('school_section'))
                {
                    $school_section = $request->school_section;
                    $stats = [
                        'أولى رياض اطفال' => [
                            'moslm_male' => Student::where('section', $request->school_section)->where('level_id', 11)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->where('level_id', 11)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->where('level_id', 11)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->where('level_id', 11)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->where('level_id', 11)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->where('level_id', 11)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->where('level_id', 11)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->where('level_id', 11)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->where('level_id', 11)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->where('level_id', 11)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->where('level_id', 11)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'ثانية رياض اطفال' => [
                            'moslm_male' => Student::where('section', $request->school_section)->where('level_id', 12)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->where('level_id', 12)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->where('level_id', 12)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->where('level_id', 12)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->where('level_id', 12)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->where('level_id', 12)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->where('level_id', 12)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->where('level_id', 12)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->where('level_id', 12)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->where('level_id', 12)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->where('level_id', 12)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'إجمالي رياض اطفال' => [
                            'moslm_male' => Student::where('section', $request->school_section)->whereIn('level_id', [11, 12])
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->whereIn('level_id', [11, 12])
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->whereIn('level_id', [11, 12])
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->whereIn('level_id', [11, 12])
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->whereIn('level_id', [11, 12])
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->whereIn('level_id', [11, 12])
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->whereIn('level_id', [11, 12])
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->whereIn('level_id', [11, 12])
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->whereIn('level_id', [11, 12])
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->whereIn('level_id', [11, 12])
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->whereIn('level_id', [11, 12])->count(DB::raw('DISTINCT classroom')),
                        ],
                        'أولى إبتدائي' => [
                            'moslm_male' => Student::where('section', $request->school_section)->where('level_id', 21)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->where('level_id', 21)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->where('level_id', 21)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->where('level_id', 21)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->where('level_id', 21)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->where('level_id', 21)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->where('level_id', 21)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->where('level_id', 21)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->where('level_id', 21)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->where('level_id', 21)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->where('level_id', 21)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'ثانية إبتدائي' => [
                            'moslm_male' => Student::where('section', $request->school_section)->where('level_id', 22)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->where('level_id', 22)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->where('level_id', 22)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->where('level_id', 22)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->where('level_id', 22)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->where('level_id', 22)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->where('level_id', 22)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->where('level_id', 22)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->where('level_id', 22)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->where('level_id', 22)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->where('level_id', 22)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'ثالثة إبتدائي' => [
                            'moslm_male' => Student::where('section', $request->school_section)->where('level_id', 23)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->where('level_id', 23)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->where('level_id', 23)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->where('level_id', 23)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->where('level_id', 23)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->where('level_id', 23)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->where('level_id', 23)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->where('level_id', 23)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->where('level_id', 23)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->where('level_id', 23)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->where('level_id', 23)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'رابعة إبتدائي' => [
                            'moslm_male' => Student::where('section', $request->school_section)->where('level_id', 24)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->where('level_id', 24)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->where('level_id', 24)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->where('level_id', 24)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->where('level_id', 24)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->where('level_id', 24)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->where('level_id', 24)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->where('level_id', 24)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->where('level_id', 24)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->where('level_id', 24)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->where('level_id', 24)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'خامسة إبتدائي' => [
                            'moslm_male' => Student::where('section', $request->school_section)->where('level_id', 25)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->where('level_id', 25)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->where('level_id', 25)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->where('level_id', 25)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->where('level_id', 25)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->where('level_id', 25)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->where('level_id', 25)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->where('level_id', 25)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->where('level_id', 25)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->where('level_id', 25)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->where('level_id', 25)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'سادسة إبتدائي' => [
                            'moslm_male' => Student::where('section', $request->school_section)->where('level_id', 26)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->where('level_id', 26)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->where('level_id', 26)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->where('level_id', 26)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->where('level_id', 26)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->where('level_id', 26)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->where('level_id', 26)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->where('level_id', 26)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->where('level_id', 26)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->where('level_id', 26)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->where('level_id', 26)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'إجمالي إبتدائي' => [
                            'moslm_male' => Student::where('section', $request->school_section)->whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->whereIn('level_id', [21, 22, 23, 24, 25, 26])->count(DB::raw('DISTINCT classroom')),
                        ],
                        'إولى إعدادي' => [
                            'moslm_male' => Student::where('section', $request->school_section)->where('level_id', 31)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->where('level_id', 31)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->where('level_id', 31)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->where('level_id', 31)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->where('level_id', 31)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->where('level_id', 31)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->where('level_id', 31)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->where('level_id', 31)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->where('level_id', 31)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->where('level_id', 31)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->where('level_id', 31)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'ثانية إعدادي' => [
                            'moslm_male' => Student::where('section', $request->school_section)->where('level_id', 32)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->where('level_id', 32)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->where('level_id', 32)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->where('level_id', 32)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->where('level_id', 32)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->where('level_id', 32)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->where('level_id', 32)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->where('level_id', 32)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->where('level_id', 32)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->where('level_id', 32)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->where('level_id', 32)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'ثالثة إعدادي' => [
                            'moslm_male' => Student::where('section', $request->school_section)->where('level_id', 33)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->where('level_id', 33)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->where('level_id', 33)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->where('level_id', 33)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->where('level_id', 33)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->where('level_id', 33)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->where('level_id', 33)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->where('level_id', 33)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->where('level_id', 33)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->where('level_id', 33)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->where('level_id', 33)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'إجمالي إعدادي' => [
                            'moslm_male' => Student::where('section', $request->school_section)->whereIn('level_id', [31, 32, 33])
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->whereIn('level_id', [31, 32, 33])
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->whereIn('level_id', [31, 32, 33])
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->whereIn('level_id', [31, 32, 33])
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->whereIn('level_id', [31, 32, 33])
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->whereIn('level_id', [31, 32, 33])
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->whereIn('level_id', [31, 32, 33])
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->whereIn('level_id', [31, 32, 33])
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->whereIn('level_id', [31, 32, 33])
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->whereIn('level_id', [31, 32, 33])
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->whereIn('level_id', [31, 32, 33])->count(DB::raw('DISTINCT classroom')),
                        ],
                        'إولى ثانوي' => [
                            'moslm_male' => Student::where('section', $request->school_section)->where('level_id', 41)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->where('level_id', 41)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->where('level_id', 41)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->where('level_id', 41)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->where('level_id', 41)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->where('level_id', 41)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->where('level_id', 41)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->where('level_id', 41)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->where('level_id', 41)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->where('level_id', 41)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->where('level_id', 41)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'ثانية ثانوي' => [
                            'moslm_male' => Student::where('section', $request->school_section)->where('level_id', 42)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->where('level_id', 42)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->where('level_id', 42)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->where('level_id', 42)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->where('level_id', 42)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->where('level_id', 42)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->where('level_id', 42)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->where('level_id', 42)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->where('level_id', 42)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->where('level_id', 42)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->where('level_id', 42)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'ثالثة ثانوي' => [
                            'moslm_male' => Student::where('section', $request->school_section)->where('level_id', 43)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->where('level_id', 43)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->where('level_id', 43)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->where('level_id', 43)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->where('level_id', 43)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->where('level_id', 43)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->where('level_id', 43)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->where('level_id', 43)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->where('level_id', 43)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->where('level_id', 43)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->where('level_id', 43)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'إجمالي ثانوي' => [
                            'moslm_male' => Student::where('section', $request->school_section)->whereIn('level_id', [41, 42, 43])
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('section', $request->school_section)->whereIn('level_id', [41, 42, 43])
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('section', $request->school_section)->whereIn('level_id', [41, 42, 43])
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('section', $request->school_section)->whereIn('level_id', [41, 42, 43])
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('section', $request->school_section)->whereIn('level_id', [41, 42, 43])
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('section', $request->school_section)->whereIn('level_id', [41, 42, 43])
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('section', $request->school_section)->whereIn('level_id', [41, 42, 43])
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('section', $request->school_section)->whereIn('level_id', [41, 42, 43])
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('section', $request->school_section)->whereIn('level_id', [41, 42, 43])
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('section', $request->school_section)->whereIn('level_id', [41, 42, 43])
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('section', $request->school_section)->whereIn('level_id', [41, 42, 43])->count(DB::raw('DISTINCT classroom')),
                        ]
                    ];
                }
                else
                {
                    $school_section = 'الكل';
                    $stats = [
                        'أولى رياض اطفال' => [
                            'moslm_male' => Student::where('level_id', 11)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('level_id', 11)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('level_id', 11)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('level_id', 11)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('level_id', 11)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('level_id', 11)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('level_id', 11)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('level_id', 11)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('level_id', 11)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('level_id', 11)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('level_id', 11)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'ثانية رياض اطفال' => [
                            'moslm_male' => Student::where('level_id', 12)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('level_id', 12)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('level_id', 12)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('level_id', 12)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('level_id', 12)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('level_id', 12)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('level_id', 12)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('level_id', 12)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('level_id', 12)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('level_id', 12)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('level_id', 12)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'إجمالي رياض اطفال' => [
                            'moslm_male' => Student::whereIn('level_id', [11, 12])
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::whereIn('level_id', [11, 12])
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::whereIn('level_id', [11, 12])
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::whereIn('level_id', [11, 12])
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::whereIn('level_id', [11, 12])
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::whereIn('level_id', [11, 12])
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::whereIn('level_id', [11, 12])
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::whereIn('level_id', [11, 12])
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::whereIn('level_id', [11, 12])
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::whereIn('level_id', [11, 12])
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::whereIn('level_id', [11, 12])->count(DB::raw('DISTINCT classroom')),
                        ],
                        'أولى إبتدائي' => [
                            'moslm_male' => Student::where('level_id', 21)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('level_id', 21)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('level_id', 21)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('level_id', 21)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('level_id', 21)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('level_id', 21)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('level_id', 21)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('level_id', 21)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('level_id', 21)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('level_id', 21)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('level_id', 21)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'ثانية إبتدائي' => [
                            'moslm_male' => Student::where('level_id', 22)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('level_id', 22)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('level_id', 22)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('level_id', 22)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('level_id', 22)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('level_id', 22)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('level_id', 22)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('level_id', 22)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('level_id', 22)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('level_id', 22)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('level_id', 22)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'ثالثة إبتدائي' => [
                            'moslm_male' => Student::where('level_id', 23)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('level_id', 23)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('level_id', 23)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('level_id', 23)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('level_id', 23)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('level_id', 23)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('level_id', 23)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('level_id', 23)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('level_id', 23)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('level_id', 23)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('level_id', 23)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'رابعة إبتدائي' => [
                            'moslm_male' => Student::where('level_id', 24)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('level_id', 24)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('level_id', 24)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('level_id', 24)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('level_id', 24)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('level_id', 24)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('level_id', 24)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('level_id', 24)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('level_id', 24)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('level_id', 24)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('level_id', 24)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'خامسة إبتدائي' => [
                            'moslm_male' => Student::where('level_id', 25)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('level_id', 25)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('level_id', 25)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('level_id', 25)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('level_id', 25)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('level_id', 25)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('level_id', 25)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('level_id', 25)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('level_id', 25)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('level_id', 25)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('level_id', 25)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'سادسة إبتدائي' => [
                            'moslm_male' => Student::where('level_id', 26)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('level_id', 26)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('level_id', 26)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('level_id', 26)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('level_id', 26)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('level_id', 26)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('level_id', 26)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('level_id', 26)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('level_id', 26)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('level_id', 26)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('level_id', 26)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'إجمالي إبتدائي' => [
                            'moslm_male' => Student::whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::whereIn('level_id', [21, 22, 23, 24, 25, 26])
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::whereIn('level_id', [21, 22, 23, 24, 25, 26])->count(DB::raw('DISTINCT classroom')),
                        ],
                        'إولى إعدادي' => [
                            'moslm_male' => Student::where('level_id', 31)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('level_id', 31)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('level_id', 31)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('level_id', 31)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('level_id', 31)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('level_id', 31)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('level_id', 31)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('level_id', 31)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('level_id', 31)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('level_id', 31)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('level_id', 31)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'ثانية إعدادي' => [
                            'moslm_male' => Student::where('level_id', 32)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('level_id', 32)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('level_id', 32)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('level_id', 32)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('level_id', 32)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('level_id', 32)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('level_id', 32)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('level_id', 32)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('level_id', 32)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('level_id', 32)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('level_id', 32)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'ثالثة إعدادي' => [
                            'moslm_male' => Student::where('level_id', 33)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('level_id', 33)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('level_id', 33)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('level_id', 33)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('level_id', 33)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('level_id', 33)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('level_id', 33)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('level_id', 33)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('level_id', 33)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('level_id', 33)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('level_id', 33)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'إجمالي إعدادي' => [
                            'moslm_male' => Student::whereIn('level_id', [31, 32, 33])
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::whereIn('level_id', [31, 32, 33])
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::whereIn('level_id', [31, 32, 33])
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::whereIn('level_id', [31, 32, 33])
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::whereIn('level_id', [31, 32, 33])
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::whereIn('level_id', [31, 32, 33])
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::whereIn('level_id', [31, 32, 33])
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::whereIn('level_id', [31, 32, 33])
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::whereIn('level_id', [31, 32, 33])
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::whereIn('level_id', [31, 32, 33])
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::whereIn('level_id', [31, 32, 33])->count(DB::raw('DISTINCT classroom')),
                        ],
                        'إولى ثانوي' => [
                            'moslm_male' => Student::where('level_id', 41)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('level_id', 41)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('level_id', 41)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('level_id', 41)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('level_id', 41)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('level_id', 41)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('level_id', 41)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('level_id', 41)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('level_id', 41)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('level_id', 41)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('level_id', 41)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'ثانية ثانوي' => [
                            'moslm_male' => Student::where('level_id', 42)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('level_id', 42)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('level_id', 42)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('level_id', 42)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('level_id', 42)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('level_id', 42)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('level_id', 42)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('level_id', 42)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('level_id', 42)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('level_id', 42)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('level_id', 42)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'ثالثة ثانوي' => [
                            'moslm_male' => Student::where('level_id', 43)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::where('level_id', 43)
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::where('level_id', 43)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::where('level_id', 43)
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::where('level_id', 43)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::where('level_id', 43)
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::where('level_id', 43)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::where('level_id', 43)
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::where('level_id', 43)
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::where('level_id', 43)
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::where('level_id', 43)->count(DB::raw('DISTINCT classroom')),
                        ],
                        'إجمالي ثانوي' => [
                            'moslm_male' => Student::whereIn('level_id', [41, 42, 43])
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'ذكر')->count(),
                            'moslm_female' => Student::whereIn('level_id', [41, 42, 43])
                                        ->where('religion', 'مسلم')
                                        ->where('gender', 'انثى')->count(),
                            'christian_male' => Student::whereIn('level_id', [41, 42, 43])
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'ذكر')->count(),
                            'christian_female' => Student::whereIn('level_id', [41, 42, 43])
                                        ->where('religion', 'مسيحي')
                                        ->where('gender', 'انثى')->count(),
                            'wafd_male' => Student::whereIn('level_id', [41, 42, 43])
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'ذكر')->count(),
                            'wafd_female' => Student::whereIn('level_id', [41, 42, 43])
                                        ->where('residence_status', 'وافد')
                                        ->where('gender', 'انثى')->count(),
                            '3aed_male' => Student::whereIn('level_id', [41, 42, 43])
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'ذكر')->count(),
                            '3aed_female' => Student::whereIn('level_id', [41, 42, 43])
                                        ->where('residence_status', 'عائد')
                                        ->where('gender', 'انثى')->count(),
                            'males' => Student::whereIn('level_id', [41, 42, 43])
                                        ->where('gender', 'ذكر')->count(),
                            'females' => Student::whereIn('level_id', [41, 42, 43])
                                        ->where('gender', 'انثى')->count(),
                            'classrooms' => Student::whereIn('level_id', [41, 42, 43])->count(DB::raw('DISTINCT classroom')),
                        ]
                    ];
                }
                

                

                return view('admin.reports.stats', compact('stats', 'school_section'));
            }
            elseif ($request->type == 'seats')
            {
                if($request->filled('school_section')){$section = $request->school_section;}
                else{$section = 'الكل';}
                
                if ($request->filled('level') && $request->filled('level_name')) 
                {
                    $level = Level::where('level', 'like', $request->level)
                            ->where('name', 'like', $request->level_name)->first();
                    // dd($level);
                    $level_compact = $level->level; $level_section = $level->name;
                    
                    if ($request->filled('classroom'))
                    {
                        $classroom = $request->classroom;
                        if($request->filled('academic_year'))
                        {
                            $academic_year = $request->academic_year;
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('level_id', $level->id)
                            ->where('classroom', $request->classroom)
                            ->where('academic_year', 'like', $request->academic_year)->get();
                        }
                        else
                        {
                            $academic_year = 'الكل';
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('level_id', $level->id)
                            ->where('classroom', $request->classroom)->get();
                        }
                    }
                    else
                    {
                        $classroom = 'الكل';
                        if($request->filled('academic_year'))
                        {
                            $academic_year = $request->academic_year;
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('level_id', $level->id)
                            ->where('academic_year', 'like', $request->academic_year)->get();
                        }
                        else
                        {
                            $academic_year = 'الكل';
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('level_id', $level->id)->get();
                        }
                    }
                }
                else
                {
                    $level_compact = 'الكل'; $level_section = 'الكل';
                    if ($request->filled('classroom'))
                    {
                        $classroom = $request->classroom;
                        if($request->filled('academic_year'))
                        {
                            $academic_year = $request->academic_year;
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('classroom', $request->classroom)
                            ->where('academic_year', 'like', $request->academic_year)->get();
                        }
                        else
                        {
                            $academic_year = 'الكل';
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('classroom', $request->classroom)->get();
                        }
                    }
                    else
                    {
                        $classroom = 'الكل';
                        if($request->filled('academic_year'))
                        {
                            $academic_year = $request->academic_year;
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('academic_year', 'like', $request->academic_year)->get();
                        }
                        else
                        {
                            $academic_year = 'الكل';
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')->get();
                        }
                    }
                }
                return view('admin.reports.seats', compact('students', 'level_compact', 'level_section', 'section'));
            }
            elseif ($request->type == 'seatsno')
            {
                if($request->filled('school_section')){$section = $request->school_section;}
                else{$section = 'الكل';}
                
                if ($request->filled('level') && $request->filled('level_name')) 
                {
                    $level = Level::where('level', 'like', $request->level)
                            ->where('name', 'like', $request->level_name)->first();
                    // dd($level);
                    $level_compact = $level->level; $level_section = $level->name;
                    
                    if ($request->filled('classroom'))
                    {
                        $classroom = $request->classroom;
                        if($request->filled('academic_year'))
                        {
                            $academic_year = $request->academic_year;
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('level_id', $level->id)
                            ->where('classroom', $request->classroom)
                            ->where('academic_year', 'like', $request->academic_year)->get();
                        }
                        else
                        {
                            $academic_year = 'الكل';
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('level_id', $level->id)
                            ->where('classroom', $request->classroom)->get();
                        }
                    }
                    else
                    {
                        $classroom = 'الكل';
                        if($request->filled('academic_year'))
                        {
                            $academic_year = $request->academic_year;
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('level_id', $level->id)
                            ->where('academic_year', 'like', $request->academic_year)->get();
                        }
                        else
                        {
                            $academic_year = 'الكل';
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('level_id', $level->id)->get();
                        }
                    }
                }
                else
                {
                    $level_compact = 'الكل'; $level_section = 'الكل';
                    if ($request->filled('classroom'))
                    {
                        $classroom = $request->classroom;
                        if($request->filled('academic_year'))
                        {
                            $academic_year = $request->academic_year;
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('classroom', $request->classroom)
                            ->where('academic_year', 'like', $request->academic_year)->get();
                        }
                        else
                        {
                            $academic_year = 'الكل';
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('classroom', $request->classroom)->get();
                        }
                    }
                    else
                    {
                        $classroom = 'الكل';
                        if($request->filled('academic_year'))
                        {
                            $academic_year = $request->academic_year;
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')
                            ->where('academic_year', 'like', $request->academic_year)->get();
                        }
                        else
                        {
                            $academic_year = 'الكل';
                            $students = Student::where('section', 'like', '%'.$request->school_section.'%')->get();
                        }
                    }
                }
                return view('admin.reports.seatsno', compact('students', 'level_compact', 'level_section', 'section', 'academic_year'));
            }
        }
    }

    public function committee(Request $request)
    {
        foreach($request->students_ids as $student)
        {
            $stu = Student::find($student);

            $stu->committeeno = $request->committeeno;
            $stu->save();
        }
    }

    public function seat(Request $request)
    {
        $from = $request->seat_from; $to = $request->seat_to;
        foreach($request->students_ids as $student)
        {
            $stu = Student::find($student);

            $stu->seatno = $from;
            $stu->save();

            $from += 1;
            if($from > $to)
            {
                break;
            }
        }
    }
}
