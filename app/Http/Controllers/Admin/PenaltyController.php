<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Penalty;
use Illuminate\Http\Request;

class PenaltyController extends Controller
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
            $penalty = Penalty::where('teacher_id', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->orWhere('amount', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $penalty = Penalty::latest()->paginate($perPage);
        }

        return view('admin/penalty.penalty.index', compact('penalty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin/penalty.penalty.create');
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
			'amount' => 'required',
			'type' => 'required'
		]);
        $requestData = $request->all();
        
        Penalty::create($requestData);

        return redirect('penalty')->with('flash_message', 'Penalty added!');
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
        $penalty = Penalty::findOrFail($id);

        return view('admin/penalty.penalty.show', compact('penalty'));
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
        $penalty = Penalty::findOrFail($id);

        return view('admin/penalty.penalty.edit', compact('penalty'));
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
			'amount' => 'required',
			'type' => 'required'
		]);
        $requestData = $request->all();
        
        $penalty = Penalty::findOrFail($id);
        $penalty->update($requestData);

        return redirect('penalty')->with('flash_message', 'Penalty updated!');
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
        Penalty::destroy($id);

        return redirect('penalty')->with('flash_message', 'Penalty deleted!');
    }
}
