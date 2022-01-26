<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Response;
use App\Models\Solution;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    private function validateRequest(Request $request)
    {
        return $request->validate([
            'points' => ['numeric'],
            'solution_id' =>['required']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $data = $request->only(['solution_id','text','points']);
        $response = new Response();
        $response->fill($data);
        $response->save();
        $solution = Solution::find($request['solution_id']);
        return view('solutions.show',['solution'=>$solution]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function edit(Response $response)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Response $response)
    {
        $this->validateRequest($request);
        $data = $request->only(['text','user_id','link']);
        $response->fill($data);
        $response->save();
        $solution = Solution::find($request['solution_id']);
        return view('solutions.show',['solution'=>$solution]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function destroy(Response $response)
    {
        $id = $response->solution_id;
        $response->delete();
        $solution = Solution::find($id);
        return view('solutions.show',['solution'=>$solution]);
    }
}
