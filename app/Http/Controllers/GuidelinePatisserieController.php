<?php

namespace App\Http\Controllers;

use App\Models\{GuidelinePatisserie, CriteriaPatisserie};
use Illuminate\Http\Request;
use DB;
class GuidelinePatisserieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($patisseriecrits_id)
    {
        $getPatesserieCrit =  CriteriaPatisserie::where('id', $patisseriecrits_id)->first();
        $getPatesserieGuidlines = GuidelinePatisserie::where('patisserie_crit_id', $patisseriecrits_id)->get();
        return view('patisseriecrits.patisserieGuidelines', compact('getPatesserieGuidlines', 'getPatesserieCrit'));
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
        $data['patisserie_crit_id'] = $request->patisserie_crit_id; 
        $data['gd_name'] = $request->gd_name;
        $data['gd_total'] = $request->gd_total;

        DB::table('guideline_patisseries')->insert($data);
        return redirect()->back()->with('success','Successfully Created Guidelines!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GuidelinePatisserie  $guidelinePatisserie
     * @return \Illuminate\Http\Response
     */
    public function show(GuidelinePatisserie $guidelinePatisserie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GuidelinePatisserie  $guidelinePatisserie
     * @return \Illuminate\Http\Response
     */
    public function edit(GuidelinePatisserie $guidelinePatisserie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GuidelinePatisserie  $guidelinePatisserie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuidelinePatisserie $guidelinePatisserie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuidelinePatisserie  $guidelinePatisserie
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuidelinePatisserie $guidelinePatisserie)
    {
        //
    }
}
