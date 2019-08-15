<?php

namespace App\Http\Controllers;

use App\Scenario;
use App\Attribute;
use Illuminate\Http\Request;

class ScenarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $scenarios = Scenario::where('user_id',auth()->id())->get();
        return view('scenario',compact('scenarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        return view('createScenario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $scenario = Scenario::create([
            'name'         => $request->name,
            'user_id'         => 1,
        ]);
        return redirect('/scenario/'.$scenario->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Scenario  $scenario
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        $scenario = Scenario::where('id',$id)->first();

        $attrs = Attribute::where('scenario_id',$id)->get();

        return view('showScenario',compact('scenario','attrs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Scenario  $scenario
     * @return \Illuminate\Http\Response
     */
    public function edit(Scenario $scenario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Scenario  $scenario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scenario $scenario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scenario  $scenario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scenario $scenario)
    {
        //
    }
}
