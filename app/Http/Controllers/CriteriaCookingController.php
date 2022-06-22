<?php

namespace App\Http\Controllers;

use App\Models\CriteriaCooking;
use Illuminate\Http\Request;
use DB;
class CriteriaCookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $getCookingCrits = CriteriaCooking::get();
        return view('cookingcrits.index', compact('getCookingCrits'));//
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
        $data['quali_id'] = 5; 
        $data['crit_name'] = $request->crit_name;
        $data['crit_percentage'] = $request->crit_percentage;

        DB::table('criteria_cookings')->insert($data);
        return redirect()->back()->with('success','Successfully Created Criteria!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CriteriaCooking  $criteriaCooking
     * @return \Illuminate\Http\Response
     */
    public function show(CriteriaCooking $criteriaCooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CriteriaCooking  $criteriaCooking
     * @return \Illuminate\Http\Response
     */
    public function edit(CriteriaCooking $criteriaCooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CriteriaCooking  $criteriaCooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CriteriaCooking $criteriaCooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CriteriaCooking  $criteriaCooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(CriteriaCooking $criteriaCooking)
    {
        //
    }
}
