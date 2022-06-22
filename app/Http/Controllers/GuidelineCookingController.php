<?php

namespace App\Http\Controllers;

use App\Models\{GuidelineCooking, CriteriaCooking};
use Illuminate\Http\Request;
use DB;
class GuidelineCookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cookingcrits_id)
    {
        $getCookingCrit =  CriteriaCooking::where('id', $cookingcrits_id)->first();
        $getCookingGuidlines = GuidelineCooking::where('cooking_crit_id', $cookingcrits_id)->get();
        return view('cookingcrits.cookingGuidelines', compact('getCookingGuidlines', 'getCookingCrit'));
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
        $data['cooking_crit_id'] = $request->cooking_crit_id; 
        $data['gd_name'] = $request->gd_name;
        $data['gd_total'] = $request->gd_total;

        DB::table('guideline_cookings')->insert($data);
        return redirect()->back()->with('success','Successfully Created Guidelines!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GuidelineCooking  $guidelineCooking
     * @return \Illuminate\Http\Response
     */
    public function show(GuidelineCooking $guidelineCooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GuidelineCooking  $guidelineCooking
     * @return \Illuminate\Http\Response
     */
    public function edit(GuidelineCooking $guidelineCooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GuidelineCooking  $guidelineCooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuidelineCooking $guidelineCooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuidelineCooking  $guidelineCooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuidelineCooking $guidelineCooking)
    {
        //
    }
}
