<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Absence;
use Illuminate\Http\Request;

class AbsenceController extends Controller
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
            $absence = Absence::where('teacher_id', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->orWhere('reason', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $absence = Absence::latest()->paginate($perPage);
        }

        return view('admin/absence.absence.index', compact('absence'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin/absence.absence.create');
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
			'teacher_id' => 'required',
			'date' => 'required',
			'reason' => 'required'
		]);
        $requestData = $request->all();
        
        Absence::create($requestData);

        return redirect('absence')->with('flash_message', 'Absence added!');
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
        $absence = Absence::findOrFail($id);

        return view('admin/absence.absence.show', compact('absence'));
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
        $absence = Absence::findOrFail($id);

        return view('admin/absence.absence.edit', compact('absence'));
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
        $this->validate($request, [
			'teacher_id' => 'required',
			'date' => 'required',
			'reason' => 'required'
		]);
        $requestData = $request->all();
        
        $absence = Absence::findOrFail($id);
        $absence->update($requestData);

        return redirect('absence')->with('flash_message', 'Absence updated!');
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
        Absence::destroy($id);

        return redirect('absence')->with('flash_message', 'Absence deleted!');
    }
}
