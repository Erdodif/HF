<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    private function validateRequest(Request $request)
    {
        return $request->validate([
            'owner_id' => ['required','numeric'],
            'title' => ['required','min:8','max:50'],
            'description' => ['required','min:10','max:1024'],
            'class_id' => ['required','numeric'],
            'due' => ['required','date']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Assignment::all();
        return view('assignments.index', ['assignments' => $assignments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assignments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        $data = $request->only(['owner_id', 'title', 'description', 'class_id', 'max_points', 'due', 'last_due']);
        $assignment = new Assignment();
        $assignment->fill($data);
        if ($request['null_last_due'] == true) {
            $assignment->last_due = null;
        } else {
            $assignment->last_due = $request['last_due'];
        }
        if ($request['null_may_points'] == true) {
            $assignment->max_points = null;
        } else {
            $assignment->max_points = $request['max_points'];
        }
        $assignment->due = $request['duedate'] . ' ' . $request['duetime'];
        $assignment->save();
        return redirect()->route('assignments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        return view('assignments.show', ['assignment' => $assignment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        return view('assignments.edit', ['assignment' => $assignment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        $this->validateRequest($request);
        $assignment->fill($request->only(['owner_id', 'title', 'description', 'class_id']));
        if ($request['null_last_due'] == true) {
            $assignment->last_due = null;
        } else {
            $assignment->last_due = $request['last_due'];
        }
        if ($request['null_may_points'] == true) {
            $assignment->max_points = null;
        } else {
            $assignment->max_points = $request['max_points'];
        }
        $assignment->due = $request['duedate'] . ' ' . $request['duetime'];
        $assignment->save();
        return redirect()->route('assignments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        $assignment->delete();
        return redirect()->route('assignments.index');
    }
}
