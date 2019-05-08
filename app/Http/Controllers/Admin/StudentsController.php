<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Student;
use App\Absence;
use App\Level;
use Illuminate\Http\Request;
use Session;
use Facades\App\Our_helpers;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $students = Student::where('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('stage', 'LIKE', "%$keyword%")
                ->orWhere('stage_year', 'LIKE', "%$keyword%")
                ->orWhere('birthdate', 'LIKE', "%$keyword%")
                ->orWhere('academic_year', 'LIKE', "%$keyword%")
                ->orWhere('monthly_evaluation', 'LIKE', "%$keyword%")
                ->orWhere('religion', 'LIKE', "%$keyword%")
                ->orWhere('national_id', 'LIKE', "%$keyword%")
                ->orWhere('parent_national_id', 'LIKE', "%$keyword%")
                ->orWhere('parent_phone', 'LIKE', "%$keyword%")
                ->orWhere('parent_email', 'LIKE', "%$keyword%")
                ->orWhere('parent_social_status', 'LIKE', "%$keyword%")
                ->orWhere('parent_qualification', 'LIKE', "%$keyword%")
                ->orWhere('parent_name', 'LIKE', "%$keyword%")
                ->orWhere('fees', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $students = Student::latest()->paginate($perPage);
        }
        Our_Helpers::modelsCMAP($students);
        Our_Helpers::modelsTAP($students);
        Our_Helpers::modelsAge($students);
        
        $current_day = date('d');
        $current_month = date('m');
        $current_year = date('Y');

        return view('admin.students.index', compact('students', 'current_day', 'current_month', 'current_year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //dd($request->avatar);
        $this->validate($request, [
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|min:3',
            'national_id' => 'required|min:14|numeric',
            'phone' => 'required|numeric',
            'email' => 'nullable|email',
			'level' => 'required',
			'level_name' => 'required',
			'academic_year' => 'required',
            'birthdate' => 'required|date_format:"Y-m-d"',
			'parent_name' => 'required|min:3',
			'parent_national_id' => 'required|min:14|numeric',
            'parent_phone' => 'required|numeric',
            'parent_email' => 'nullable|email',
			'fees' => 'required'
        ]);

        
        
        $requestData = $request->except('level', 'level_name');
        
        $level_id = $request->level . $request->level_name;
        
        $requestData['level_id'] = $level_id;
        //dd($requestData);
        //$level = Level::find($level_id);
        
        //dd($level);
        
        $student = Student::create($requestData);
        //$student->level()->associate($level);
        
        if($request->has('avatar'))
        {
            //dd("HEErrree");
            $name = time().'_'.$request->avatar->getClientOriginalName();
            $request->avatar->move('images/avatars', $name);

            $student->avatar = 'images/avatars/' . $name;
            $student->save();
        }
        else
        {
            $student->avatar = 'images/avatars/studentDefault.png';
            $student->save();
        }

        Session::flash('success', 'تم إضافة الطالب بنجاح');
        return redirect('students');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);

        return view('admin.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $student = Student::findOrFail($id);
        //dd($student);
        if($request->has('absence_days'))
        {
            //dd($request->absence_days);
            $from = date_create('first day of this month')->format('Y-m-d');
            $student_absence_date = $student->absence()->where('date', '>=', $from)->get('date')->toArray();
            $student_absence_date_days = [];
            $current_year = date('Y');
            $current_month = date('m');
            foreach($student_absence_date as $absence)
            {
                //dd($absence);
                $date_days = $absence['date'];
                $date_days = date_create_from_format("Y-m-d", $date_days);
                array_push($student_absence_date_days, $date_days->format('d'));
            }
            //dd($request->absence_days, $student_absence_date_days);
            foreach($request->absence_days as $day)
            {
                
                if(!in_array($day, $student_absence_date_days))
                {
                    $date = $current_year . '-' . $current_month . '-' . $day;
                    //dd($date);
                    $absence_day = new Absence(['student_id' => $id, 'date' => $date, 'teacher_id' => 0, 'worker_id' => 0, 'reason' => '']);
                    $student->absence()->save($absence_day);
                }
                else
                {
                    $absence_record = Absence::where('date', $current_year . '-' . $current_month . '-' . $day)->where('student_id', $id)->first();
                    //dd($absence_record);
                    $absence_record->delete();
                }
            }
            //Session::flash('sucess', 'تم تعديل ايام الغياب لهذا المدرس');
            return response()->json(['sucess' => 'تم تعديل ايام الغياب لهذا الطالب']);
        }
        if ($request->has('image_file')) {
            //dd($request->image_file);
            $this->validate($request,[
                'image_file' => 'nullable||image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $name = time().'_'.$request->image_file->getClientOriginalName();
            $request->image_file->move('images/avatars', $name);

            $student->avatar = 'images/avatars/' . $name;
            $student->save();
            return back();
        }

        if($request->attribute == 'name' || $request->attribute == 'parent_name' || $request->attribute == 'phone' || $request->attribute == 'parent_phone' || $request->attribute == 'stage' || $request->attribute == 'fees' || $request->attribute == 'stage_year')
        {
            $this->validate($request,[
                'updated_data' => 'required|min:3'
            ]);
        }
        elseif ($request->attribute == 'national_id' || $request->attribute == 'parent_national_id') {
            $this->validate($request,[
                'updated_data' => 'required|min:14|numeric'
            ]);
        }
        elseif ($request->attribute == 'email' || $request->attribute == 'parent_email') {
            $this->validate($request,[
                'updated_data' => 'nullable|email'
            ]);
        }
        elseif ($request->attribute == 'birthdate') {
            $this->validate($request,[
                'updated_data' => 'required|date_format:"Y-m-d"'
            ]);
        }
        elseif ($request->attribute == 'classroom' || $request->attribute == 'monthly_evaluation') {
            $this->validate($request,[
                'updated_data' => 'nullable|numeric'
            ]);
        }

        if ($request->attribute == 'level' || $request->attribute == 'level_name')
        {
            $level = $student->level;
            if($request->attribute == 'level')
            {
                $new_level = Level::where('level', $request->updated_data)->where('name', $level->name)->first();
            }
            else
            {
                $new_level = Level::where('name', $request->updated_data)->where('level', $level->level)->first();
            }
            //dd($new_level, $level->name, $level->level,$request->attribute, $request->updated_data);
            $student->level_id = $new_level->id;
            $student->save();
            return response()->json(['successs'=>'Data is successfully added']);
        }
        
        $student->update([$request->attribute => $request->updated_data]);
        //dd($request->attribute , $request->updated_data, $student->gender);

        return response()->json(['successs'=>'Data is successfully added']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Student::destroy($id);

        return redirect('students')->with('flash_message', 'Student deleted!');
    }

    public function getFees($id)
    {
        $student = Student::find($id);
        $fees = $student->feesModel;
        $reminders = [];
        $student_charges = $student->level->fees;
        //dd($student_charges);
        foreach($fees as $fee)
        {
            $student_charges = $student_charges - $fee->amount;
            array_push($reminders, $student_charges);
        }
        $fees = $fees->toJson(JSON_UNESCAPED_UNICODE);

        //dd($reminders, gettype($fees));
        return response()->json(['fees' => $fees, 'reminders' => $reminders]);
    }
    
}
