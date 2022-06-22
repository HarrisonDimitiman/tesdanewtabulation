<?php

namespace App\Http\Controllers;

use App\Models\CriteriaRestaurant;
use Illuminate\Http\Request;
use DB;

class CriteriaRestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getRestaurantCrits = CriteriaRestaurant::get();
        return view('restaurantcrits.index', compact('getRestaurantCrits'));
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
        $data['quali_id'] = 6; 
        $data['crit_name'] = $request->crit_name;
        $data['crit_percentage'] = $request->crit_percentage;

        DB::table('criteria_restaurants')->insert($data);
        return redirect()->back()->with('success','Successfully Created Criteria!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CriteriaRestaurant  $criteriaRestaurant
     * @return \Illuminate\Http\Response
     */
    public function show(CriteriaRestaurant $criteriaRestaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CriteriaRestaurant  $criteriaRestaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(CriteriaRestaurant $criteriaRestaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CriteriaRestaurant  $criteriaRestaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CriteriaRestaurant $criteriaRestaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CriteriaRestaurant  $criteriaRestaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(CriteriaRestaurant $criteriaRestaurant)
    {
        //
    }
}
