<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Solution;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SolutionController extends Controller
{//TODO #1 create és update, validátor és a hozzájuk való blade
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Assignment $assignment)
    {
        $solutions = Solution::where('assignment_id',$assignment->id)->get();
        //$solutions = Solution::where('assignment_id',$assignment->id);
        //$solutions = Solution::all();
        return view('solutions.index',['solutions'=>$solutions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('solutions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $data = $request->only(['owner_id','title','description','class_id','max_points','due','last_due']);
        $assignment = new Assignment();
        $assignment->fill($data);
        if($request['null_last_due']==true){
            $assignment->last_due = null;
        }
        else{
            $assignment->last_due = $request['last_due'];
        }
        if($request['null_may_points']==true){
            $assignment->max_points = null;
        }
        else{
            $assignment->max_points = $request['max_points'];
        }
        $assignment->due = $request['duedate'].' '.$request['duetime'];
        $assignment->save();*/
        $solutions = Solution::where('asignment_id',$request['assignment_id']->assignment_id)->get();
        return view('solutions.index',['solutions'=>$solutions]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Solution $solution)
    {
        return view('solutions.show',['solution'=>$solution]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Solution $solution)
    {
        return view('solutions.edit',['solution'=>$solution]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solution $solution)
    {
        /*
        $assignment->fill($request->only(['owner_id','title','description','class_id']));
        if($request['null_last_due']==true){
            $assignment->last_due = null;
        }
        else{
            $assignment->last_due = $request['last_due'];
        }
        if($request['null_may_points']==true){
            $assignment->max_points = null;
        }
        else{
            $assignment->max_points = $request['max_points'];
        }
        $assignment->due = $request['duedate'].' '.$request['duetime'];
        $assignment->save();*/
        $solutions = Solution::where('asignment_id',$solution->assignment_id)->get();
        return view('solutions.index',['solutions'=>$solutions]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solution $solution)
    {
        $id = $solution->assignment_id;
        $solution->delete();
        $solutions = Solution::where('assignment_id',$id)->get();
        return view('solutions.index',['solutions'=>$solutions]);
    }
}
