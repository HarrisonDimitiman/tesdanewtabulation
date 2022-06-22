<?php

namespace App\Http\Controllers;

use App\Models\{GuidelineRestaurant, CriteriaRestaurant};
use Illuminate\Http\Request;
use DB;
class GuidelineRestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($restaurantcrits_id)
    {
        $getRestaurantCrit =  CriteriaRestaurant::where('id', $restaurantcrits_id)->first();
        $getRestaurantGuidlines = GuidelineRestaurant::where('restaurant_crit_id', $restaurantcrits_id)->get();
        return view('restaurantcrits.restaurantGuidelines', compact('getRestaurantGuidlines', 'getRestaurantCrit'));
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
        $data['restaurant_crit_id'] = $request->restaurant_crit_id; 
        $data['gd_name'] = $request->gd_name;
        $data['gd_total'] = $request->gd_total;

        DB::table('guideline_restaurants')->insert($data);
        return redirect()->back()->with('success','Successfully Created Guidelines!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GuidelineRestaurant  $guidelineRestaurant
     * @return \Illuminate\Http\Response
     */
    public function show(GuidelineRestaurant $guidelineRestaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GuidelineRestaurant  $guidelineRestaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(GuidelineRestaurant $guidelineRestaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GuidelineRestaurant  $guidelineRestaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuidelineRestaurant $guidelineRestaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuidelineRestaurant  $guidelineRestaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuidelineRestaurant $guidelineRestaurant)
    {
        //
    }
}
