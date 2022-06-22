<?php

namespace App\Http\Controllers;

use App\Models\CriteriaBaking;
use Illuminate\Http\Request;
use DB;
class CriteriaBakingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getBakingCrits = CriteriaBaking::get();
        return view('bakingcrits.index', compact('getBakingCrits'));
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
        $data['quali_id'] = 4; 
        $data['crit_name'] = $request->crit_name;
        $data['crit_percentage'] = $request->crit_percentage;

        DB::table('criteria_bakings')->insert($data);
        return redirect()->back()->with('success','Successfully Created Criteria!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CriteriaBaking  $criteriaBaking
     * @return \Illuminate\Http\Response
     */
    public function show(CriteriaBaking $criteriaBaking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CriteriaBaking  $criteriaBaking
     * @return \Illuminate\Http\Response
     */
    public function edit(CriteriaBaking $criteriaBaking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CriteriaBaking  $criteriaBaking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CriteriaBaking $criteriaBaking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CriteriaBaking  $criteriaBaking
     * @return \Illuminate\Http\Response
     */
    public function destroy(CriteriaBaking $criteriaBaking)
    {
        //
    }
}
