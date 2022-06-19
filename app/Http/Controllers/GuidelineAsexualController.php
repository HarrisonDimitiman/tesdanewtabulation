<?php

namespace App\Http\Controllers;

use App\Models\{GuidelineAsexual, CriteriaAsexual};
use Illuminate\Http\Request;
use DB;

class GuidelineAsexualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($asexualcrits_id)
    {
        $getAsexualCrit =  CriteriaAsexual::where('id', $asexualcrits_id)->first();
        $getAsexualGuidlines = GuidelineAsexual::where('asexual_crit_id', $asexualcrits_id)->get();
        return view('asexualcrits.asexualGuidelines', compact('getAsexualGuidlines', 'getAsexualCrit'));
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
        $data['asexual_crit_id'] = $request->asexual_crits_id; 
        $data['gd_name'] = $request->gd_name;
        $data['gd_total'] = $request->gd_total;

        DB::table('guideline_asexuals')->insert($data);
        return redirect()->back()->with('success','Successfully Created Guidelines!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GuidelineAsexual  $guidelineAsexual
     * @return \Illuminate\Http\Response
     */
    public function show(GuidelineAsexual $guidelineAsexual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GuidelineAsexual  $guidelineAsexual
     * @return \Illuminate\Http\Response
     */
    public function edit(GuidelineAsexual $guidelineAsexual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GuidelineAsexual  $guidelineAsexual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuidelineAsexual $guidelineAsexual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuidelineAsexual  $guidelineAsexual
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuidelineAsexual $guidelineAsexual)
    {
        //
    }
}
