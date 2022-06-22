<?php

namespace App\Http\Controllers;

use App\Models\{GuidelineBaking, CriteriaBaking};
use Illuminate\Http\Request;
use DB;
class GuidelineBakingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($bakingcrits_id)
    {
        $getBakingCrit =  CriteriaBaking::where('id', $bakingcrits_id)->first();
        $getBakingGuidlines = GuidelineBaking::where('baking_crit_id', $bakingcrits_id)->get();
        return view('bakingcrits.bakingGuidelines', compact('getBakingGuidlines', 'getBakingCrit'));
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
        $data['baking_crit_id'] = $request->baking_crit_id; 
        $data['gd_name'] = $request->gd_name;
        $data['gd_total'] = $request->gd_total;

        DB::table('guideline_bakings')->insert($data);
        return redirect()->back()->with('success','Successfully Created Guidelines!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GuidelineBaking  $guidelineBaking
     * @return \Illuminate\Http\Response
     */
    public function show(GuidelineBaking $guidelineBaking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GuidelineBaking  $guidelineBaking
     * @return \Illuminate\Http\Response
     */
    public function edit(GuidelineBaking $guidelineBaking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GuidelineBaking  $guidelineBaking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuidelineBaking $guidelineBaking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuidelineBaking  $guidelineBaking
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuidelineBaking $guidelineBaking)
    {
        //
    }
}
