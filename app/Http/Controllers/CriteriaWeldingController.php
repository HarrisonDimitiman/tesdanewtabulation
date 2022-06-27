<?php

namespace App\Http\Controllers;

use App\Models\CriteriaWelding;
use Illuminate\Http\Request;

use DB;
class CriteriaWeldingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getWeldingCrits = CriteriaWelding::get();
        return view('weldingcrits.index', compact('getWeldingCrits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $data['quali_id'] = 8; 
        $data['crit_name'] = $request->crit_name;
        $data['crit_percentage'] = $request->crit_percentage;

        DB::table('criteria_weldings')->insert($data);
        return redirect()->back()->with('success','Successfully Created Criteria!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CriteriaWelding  $criteriaWelding
     * @return \Illuminate\Http\Response
     */
    public function show(CriteriaWelding $criteriaWelding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CriteriaWelding  $criteriaWelding
     * @return \Illuminate\Http\Response
     */
    public function edit(CriteriaWelding $criteriaWelding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CriteriaWelding  $criteriaWelding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CriteriaWelding $criteriaWelding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CriteriaWelding  $criteriaWelding
     * @return \Illuminate\Http\Response
     */
    public function destroy(CriteriaWelding $criteriaWelding)
    {
        //
    }
}
