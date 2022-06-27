<?php

namespace App\Http\Controllers;

use App\Models\{GuidelineWelding, CriteriaWelding};
use Illuminate\Http\Request;
use DB;
class GuidelineWeldingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($weldingcrits_id)
    {
        $getWeldingCrit =  CriteriaWelding::where('id', $weldingcrits_id)->first();
        $getWeldingGuidlines = GuidelineWelding::where('welding_crit_id', $weldingcrits_id)->get();
        return view('weldingcrits.weldingGuidelines', compact('getWeldingGuidlines', 'getWeldingCrit'));
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
        $data['welding_crit_id'] = $request->welding_crit_id; 
        $data['gd_name'] = $request->gd_name;
        $data['gd_total'] = $request->gd_total;

        DB::table('guideline_weldings')->insert($data);
        return redirect()->back()->with('success','Successfully Created Guidelines!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GuidelineWelding  $guidelineWelding
     * @return \Illuminate\Http\Response
     */
    public function show(GuidelineWelding $guidelineWelding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GuidelineWelding  $guidelineWelding
     * @return \Illuminate\Http\Response
     */
    public function edit(GuidelineWelding $guidelineWelding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GuidelineWelding  $guidelineWelding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuidelineWelding $guidelineWelding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuidelineWelding  $guidelineWelding
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuidelineWelding $guidelineWelding)
    {
        //
    }
}
