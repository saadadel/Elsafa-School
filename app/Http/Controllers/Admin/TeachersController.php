<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Teacher;
use App\Absence;
use Illuminate\Http\Request;
use Session;
use Facades\App\Our_helpers;

class TeachersController extends Controller
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
            $teachers = Teacher::where('name', 'LIKE', "%$keyword%")
                ->orWhere('national_id', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('birthdate', 'LIKE', "%$keyword%")
                ->orWhere('social_status', 'LIKE', "%$keyword%")
                ->orWhere('qualification', 'LIKE', "%$keyword%")
                ->orWhere('religion', 'LIKE', "%$keyword%")
                ->orWhere('degree', 'LIKE', "%$keyword%")
                ->orWhere('subject', 'LIKE', "%$keyword%")
                ->orWhere('salary', 'LIKE', "%$keyword%")
                ->orWhere('st_name', 'LIKE', "%$keyword%")
                ->orWhere('building_num', 'LIKE', "%$keyword%")
                ->orWhere('region', 'LIKE', "%$keyword%")
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->orWhere('country', 'LIKE', "%$keyword%")
                ->all();
        } else {
            $teachers = Teacher::all();
        }
        Our_Helpers::modelsCMAP($teachers);
        Our_Helpers::modelsTAP($teachers);
        Our_Helpers::modelsAge($teachers);
        $current_day = date('d');
        $current_month = date('m');
        $current_year = date('Y');
        // dd($teacher->currentMonthAttendencePercentage());
        //dd($teacher->totalSalary());
        return view('admin/teachers.index', compact('teachers', 'current_day', 'current_month', 'current_year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin/teachers.create');
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
        
        $this->validate($request, [
            'avatar' => 'nullable||image|mimes:jpeg,png,jpg,gif|max:2048',
			'name' => 'required|min:3',
			'national_id' => 'required|min:14|numeric',
            'phone' => 'required|numeric',
            'email' => 'nullable|email',
            'birthdate' => 'required|date_format:"Y-m-d"',
            'socail_status' => 'nullable',
            'qualification' => 'required',
            'religion' => 'nullable',
            'degree' => 'nullable',
			'subject' => 'required',
            'salary' => 'required|numeric',
            'extras' => 'nullable|numeric',
            'penalties' => 'nullable|numeric',
            'st_name' => 'nullable',
            'building_num' => 'nullable|numeric',
            'region' => 'nullable',
            'city' => 'nullable',
            'country' => 'nullable'
        ]);
        $requestData = $request->all();
        
        $teacher = Teacher::create($requestData);

        if($request->filled('avatar'))
        {
            $name = time().'_'.$request->avatar->getClientOriginalName();
            $request->avatar->move('images/avatars', $name);

            $teacher->avatar = 'images/avatars/' . $name;
            $teacher->save();
        }
        else
        {
            $teacher->avatar = 'images/avatars/default.jpg';
            $teacher->save();
        }

        Session::flash('success', 'تم إضافة المدرس بنجاح');
        return redirect('teachers');
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
        $teacher = Teacher::findOrFail($id);

        $teacher->mail = "";
        $teacher->save();

        return view('admin/teachers.show', compact('teacher'));
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
        $teacher = Teacher::findOrFail($id);

        return view('admin/teachers.edit', compact('teacher'));
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
        $teacher = Teacher::findOrFail($id);
        //dd($teacher_absence, gettype($teacher_absence));
        if($request->has('absence_days'))
        {
            //dd($request->absence_days);
            $from = date_create('first day of this month')->format('Y-m-d');
            $teacher_absence_date = $teacher->absence()->where('date', '>=', $from)->get('date')->toArray();
            $teacher_absence_date_days = [];
            $current_year = date('Y');
            $current_month = date('m');
            foreach($teacher_absence_date as $absence)
            {
                //dd($absence);
                $date_days = $absence['date'];
                $date_days = date_create_from_format("Y-m-d", $date_days);
                array_push($teacher_absence_date_days, $date_days->format('d'));
            }
            //dd($request->absence_days, $teacher_absence_date_days);
            foreach($request->absence_days as $day)
            {
                
                if(!in_array($day, $teacher_absence_date_days))
                {
                    $date = $current_year . '-' . $current_month . '-' . $day;
                    //dd($date);
                    $absence_day = new Absence(['teacher_id' => $id, 'date' => $date, 'student_id' => 0, 'worker_id' => 0, 'reason' => '']);
                    $teacher->absence()->save($absence_day);
                }
                else
                {
                    $absence_record = Absence::where('date', $current_year . '-' . $current_month . '-' . $day)->where('teacher_id', $id)->first();
                    //dd($absence_record);
                    $absence_record->delete();
                }
            }
            //Session::flash('sucess', 'تم تعديل ايام الغياب لهذا المدرس');
            return response()->json(['sucess' => 'تم تعديل ايام الغياب لهذا المدرس']);
        }

        if ($request->has('image_file')) {
            //dd($request->image_file, $id);
            $this->validate($request,[
                'image_file' => 'nullable||image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            
            $name = time().'_'.$request->image_file->getClientOriginalName();
            $request->image_file->move('images/avatars', $name);

            $teacher->avatar = 'images/avatars/' . $name;
            $teacher->save();

            return back();
        }

        if($request->attribute == 'name' || $request->attribute == 'phone' || $request->attribute == 'qualification' || $request->attribute == 'subject')
        {
            $this->validate($request,[
                'updated_data' => 'required|min:3'
            ]);
        }
        elseif ($request->attribute == 'national_id') {
            $this->validate($request,[
                'updated_data' => 'required|min:14|numeric'
            ]);
        }
        elseif ($request->attribute == 'email') {
            $this->validate($request,[
                'updated_data' => 'nullable|email'
            ]);
        }
        elseif ($request->attribute == 'birthdate') {
            $this->validate($request,[
                'updated_data' => 'required|date_format:"Y-m-d"'
            ]);
        }
        elseif ($request->attribute == 'social_status' || $request->attribute == 'religion' || $request->attribute == 'degree') {
            $this->validate($request,[
                'updated_data' => 'nullable|min:3'
            ]);
        }
        elseif ($request->attribute == 'salary') {
            $this->validate($request,[
                'updated_data' => 'required|numeric'
            ]);
        }
        
        $teacher->update([$request->attribute => $request->updated_data]);

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
        Teacher::destroy($id);

        return response()->json(['success' => 'deleted successfully']);
    }
}
