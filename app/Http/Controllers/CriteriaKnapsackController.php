<?php

namespace App\Http\Controllers;

use App\Models\CriteriaKnapsack;
use Illuminate\Http\Request;
use DB;

class CriteriaKnapsackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getKnapsackCrits = CriteriaKnapsack::get();
        return view('knapsackcrits.index', compact('getKnapsackCrits'));
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
        $data = array();
        $data['quali_id'] = 3; 
        $data['crit_name'] = $request->crit_name;
        $data['crit_percentage'] = $request->crit_percentage;

        DB::table('criteria_knapsacks')->insert($data);
        return redirect()->back()->with('success','Successfully Created Criteria!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CriteriaKnapsack  $criteriaKnapsack
     * @return \Illuminate\Http\Response
     */
    public function show(CriteriaKnapsack $criteriaKnapsack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CriteriaKnapsack  $criteriaKnapsack
     * @return \Illuminate\Http\Response
     */
    public function edit(CriteriaKnapsack $criteriaKnapsack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CriteriaKnapsack  $criteriaKnapsack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CriteriaKnapsack $criteriaKnapsack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CriteriaKnapsack  $criteriaKnapsack
     * @return \Illuminate\Http\Response
     */
    public function destroy(CriteriaKnapsack $criteriaKnapsack)
    {
        //
    }
}
