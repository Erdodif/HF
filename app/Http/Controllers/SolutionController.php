<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Solution;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SolutionController extends Controller
{//TODO #1 create és update, validátor és a hozzájuk való blade
    private function validateRequest(Request $request)
    {
        return $request->validate([
            'assignment_id' => ['required','numeric'],
            'user_id' => ['required','numeric'],
            'link' => ['required','url']
        ]);
    }
    
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
    public function create(Assignment $assignment)
    {
        return view('solutions.create',['assignment'=>$assignment]);
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
        $data = $request->only(['assignment_id','user_id','link']);
        $solution = new Solution();
        $solution->fill($data);
        $solution->save();
        $assignment = Assignment::find($request['assignment_id']);
        return view('solutions.success',['assignment'=>$assignment]);
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
        
        $this->validateRequest($request);
        $data = $request->only(['assignment_id','user_id','link']);
        $solution->fill($data);
        $solution->save();
        $assignment = Assignment::find($request['assignment_id']);
        return view('solutions.success',['assignment'=>$assignment]);
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
