<?php

namespace App\Http\Controllers;

use App\Models\CriteriaAsexual;
use Illuminate\Http\Request;
use DB;

class CriteriaAsexualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getAsexualCrits = CriteriaAsexual::get();
        return view('asexualcrits.index', compact('getAsexualCrits'));
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
        $data['quali_id'] = 1; //1 ako gebutang kay 1 man ang ID sa ASEXUAL nga qualification
        $data['crit_name'] = $request->crit_name;
        $data['crit_percentage'] = $request->crit_percentage;

        DB::table('criteria_asexuals')->insert($data);
        return redirect()->back()->with('success','Successfully Created Criteria!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CriteriaAsexual  $criteriaAsexual
     * @return \Illuminate\Http\Response
     */
    public function show(CriteriaAsexual $criteriaAsexual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CriteriaAsexual  $criteriaAsexual
     * @return \Illuminate\Http\Response
     */
    public function edit(CriteriaAsexual $criteriaAsexual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CriteriaAsexual  $criteriaAsexual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CriteriaAsexual $criteriaAsexual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CriteriaAsexual  $criteriaAsexual
     * @return \Illuminate\Http\Response
     */
    public function destroy(CriteriaAsexual $criteriaAsexual)
    {
        //
    }
}
