<?php

namespace App\Http\Controllers;

use App\Models\{GuidelineFeed, CriteriaFeed};
use Illuminate\Http\Request;
use DB;

class GuidelineFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($feedcrits_id)
    {
        $getFeedCrit =  CriteriaFeed::where('id', $feedcrits_id)->first();
        $getFeedGuidlines = GuidelineFeed::where('feed_crit_id', $feedcrits_id)->get();
        return view('feedcrits.feedGuidelines', compact('getFeedGuidlines', 'getFeedCrit'));
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
        $data['feed_crit_id'] = $request->feed_crit_id; 
        $data['gd_name'] = $request->gd_name;
        $data['gd_total'] = $request->gd_total;

        DB::table('guideline_feeds')->insert($data);
        return redirect()->back()->with('success','Successfully Created Guidelines!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GuidelineFeed  $guidelineFeed
     * @return \Illuminate\Http\Response
     */
    public function show(GuidelineFeed $guidelineFeed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GuidelineFeed  $guidelineFeed
     * @return \Illuminate\Http\Response
     */
    public function edit(GuidelineFeed $guidelineFeed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GuidelineFeed  $guidelineFeed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuidelineFeed $guidelineFeed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuidelineFeed  $guidelineFeed
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuidelineFeed $guidelineFeed)
    {
        //
    }
}
