<?php

namespace App\Http\Controllers;

use App\Models\{ScoreAsexual, GuidelineAsexual, CriteriaAsexual};
use Illuminate\Http\Request;
use DB;
use Auth;

class ScoreAsexualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function showCritsForAsexual($id, $quali_id, $tti_id)
    {
        $crit=CriteriaAsexual::where('quali_id',$quali_id)->get();
        return view('qualification.showCritsForAsexual',compact('tti_id','quali_id','crit', 'id'));
    }

    public function scoreForAsexual($id, $quali_id, $tti_id, $crit_id)
    {
        $getAsexualGuidlines = GuidelineAsexual::where('asexual_crit_id', $crit_id)->get();
        return view('qualification.scoreForAsexual',compact('tti_id','quali_id','crit_id', 'id', 'getAsexualGuidlines'));
    }

    public function submitScoreAsexual($id, $quali_id, $tti_id, $crit_id, Request $request)
    {
        
        
        $scoreAsexual = array();
        $scoreAsexual = $request->score_asexual;
        array_unshift($scoreAsexual,"");
        unset($scoreAsexual[0]);
        $arrLength = count($scoreAsexual);
        $scoreTotal = array_sum($scoreAsexual);

        $guideAsexualId = array();
        $guideAsexualId = $request->guideAsexualId;
        array_unshift($guideAsexualId,"");
        unset($guideAsexualId[0]);
        $arrLengthGuide = count($guideAsexualId);
        

        // dd($guideAsexualId);
        for($i=1; $i <= $arrLength; $i++)
        {
            $datas = array();
            $datas['quali_id'] = $quali_id;
            $datas['asexual_crit_id'] = $crit_id;
            $datas['asexual_quide_id'] = $guideAsexualId[$i];
            $datas['user_id'] = Auth::user()->id;
            $datas['con_id'] = $id;
            $datas['total'] = $scoreTotal;
            $datas['score'] = $scoreAsexual[$i];

            DB::table('score_asexuals')->insert($datas);
        }
        return redirect()->back()->with('success','Successfully Score Contestant!!');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScoreAsexual  $scoreAsexual
     * @return \Illuminate\Http\Response
     */
    public function show(ScoreAsexual $scoreAsexual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScoreAsexual  $scoreAsexual
     * @return \Illuminate\Http\Response
     */
    public function edit(ScoreAsexual $scoreAsexual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScoreAsexual  $scoreAsexual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScoreAsexual $scoreAsexual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScoreAsexual  $scoreAsexual
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScoreAsexual $scoreAsexual)
    {
        //
    }
}
