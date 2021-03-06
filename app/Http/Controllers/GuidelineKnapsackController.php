<?php

namespace App\Http\Controllers;

use App\Models\{GuidelineKnapsack, CriteriaKnapsack};
use Illuminate\Http\Request;

class GuidelineKnapsackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($knapsackcrits_id)
    {
        $getKnapsackCrit =  CriteriaKnapsack::where('id', $knapsackcrits_id)->first();
        $getKnapsackGuidlines = GuidelineKnapsack::where('knapsack_crit_id', $knapsackcrits_id)->get();
        return view('knapsackcrits.knapsackGuidelines', compact('getKnapsackGuidlines', 'getKnapsackCrit'));
    
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
        $data['knapsack_crits_id'] = $request->knapsack_crits_id; 
        $data['gd_name'] = $request->gd_name;
        $data['gd_total'] = $request->gd_total;

        DB::table('guideline_knapsacks')->insert($data);
        return redirect()->back()->with('success','Successfully Created Guidelines!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GuidelineKnapsack  $guidelineKnapsack
     * @return \Illuminate\Http\Response
     */
    public function show(GuidelineKnapsack $guidelineKnapsack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GuidelineKnapsack  $guidelineKnapsack
     * @return \Illuminate\Http\Response
     */
    public function edit(GuidelineKnapsack $guidelineKnapsack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GuidelineKnapsack  $guidelineKnapsack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuidelineKnapsack $guidelineKnapsack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuidelineKnapsack  $guidelineKnapsack
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuidelineKnapsack $guidelineKnapsack)
    {
        //
    }
}
