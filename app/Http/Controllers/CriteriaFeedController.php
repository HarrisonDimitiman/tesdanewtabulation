<?php

namespace App\Http\Controllers;

use App\Models\CriteriaFeed;
use Illuminate\Http\Request;
use DB;

class CriteriaFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getFeedCrits = CriteriaFeed::get();
        return view('feedcrits.index', compact('getFeedCrits'));
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
        $data['quali_id'] = 2; 
        $data['crit_name'] = $request->crit_name;
        $data['crit_percentage'] = $request->crit_percentage;

        DB::table('criteria_feeds')->insert($data);
        return redirect()->back()->with('success','Successfully Created Criteria!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CriteriaFeed  $criteriaFeed
     * @return \Illuminate\Http\Response
     */
    public function show(CriteriaFeed $criteriaFeed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CriteriaFeed  $criteriaFeed
     * @return \Illuminate\Http\Response
     */
    public function edit(CriteriaFeed $criteriaFeed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CriteriaFeed  $criteriaFeed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CriteriaFeed $criteriaFeed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CriteriaFeed  $criteriaFeed
     * @return \Illuminate\Http\Response
     */
    public function destroy(CriteriaFeed $criteriaFeed)
    {
        //
    }
}
