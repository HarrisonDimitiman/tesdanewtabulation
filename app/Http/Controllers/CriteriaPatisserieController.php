<?php

namespace App\Http\Controllers;

use App\Models\CriteriaPatisserie;
use Illuminate\Http\Request;
use DB;
class CriteriaPatisserieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getPatisserieCrits = CriteriaPatisserie::get();
        return view('patisseriecrits.index', compact('getPatisserieCrits'));
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
        $data['quali_id'] = 7; 
        $data['crit_name'] = $request->crit_name;
        $data['crit_percentage'] = $request->crit_percentage;

        DB::table('criteria_patisseries')->insert($data);
        return redirect()->back()->with('success','Successfully Created Criteria!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CriteriaPatisserie  $criteriaPatisserie
     * @return \Illuminate\Http\Response
     */
    public function show(CriteriaPatisserie $criteriaPatisserie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CriteriaPatisserie  $criteriaPatisserie
     * @return \Illuminate\Http\Response
     */
    public function edit(CriteriaPatisserie $criteriaPatisserie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CriteriaPatisserie  $criteriaPatisserie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CriteriaPatisserie $criteriaPatisserie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CriteriaPatisserie  $criteriaPatisserie
     * @return \Illuminate\Http\Response
     */
    public function destroy(CriteriaPatisserie $criteriaPatisserie)
    {
        //
    }
}
