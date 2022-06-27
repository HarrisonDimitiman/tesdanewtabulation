<?php

namespace App\Http\Controllers;

use App\Models\{ScoreAsexual, GuidelineAsexual, CriteriaAsexual, CriteriaFeed, GuidelineFeed, ScoreFeed};
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
        if ($quali_id == 1) //ASEXUAL
        {
            $crit = CriteriaAsexual::where('quali_id',$quali_id)->get();
            return view('qualification.showCritsForAsexual',compact('tti_id','quali_id','crit', 'id'));
        }
        if ($quali_id == 2) //FEED
        {
            $title = "FEED";
            
           
            $crit = CriteriaFeed::where('quali_id',$quali_id)->get();
            $arrLength = count($crit);

            for($i = 0; $i <= $arrLength-1; $i++)
            {
                $ifAlreadyScore = ScoreFeed::where('quali_id',$quali_id)
                    ->where('feed_crit_id', $crit[$i]->id)
                    ->where('con_id', $id)
                    ->first();

                if ($ifAlreadyScore != '')
                {
                    $status = 1;
                    break;
                }
                else
                {
                    $status = 0;
                }
            }

            $data = array();
            if($status == 0)
            {
                for($i = 0; $i <= $arrLength-1; $i++)
                {
                    $ifAlreadyScore = ScoreFeed::where('quali_id',$quali_id)
                        ->where('feed_crit_id', $crit[$i]->id)
                        ->where('con_id', $id)
                        ->first();
                    if ($ifAlreadyScore != '')
                    {
                        $data[$i]['crit_name'] = $crit[$i]->crit_name;
                        $data[$i]['quali_id'] = $crit[$i]->quali_id;
                        $data[$i]['id'] = $crit[$i]->id;
                        $data[$i]['crit_percentage'] = $crit[$i]->crit_percentage;
                        $data[$i]['status'] = "Already Score";
                    }
                    else
                    {
                        $data[$i]['crit_name'] = $crit[$i]->crit_name;
                        $data[$i]['quali_id'] = $crit[$i]->quali_id;
                        $data[$i]['id'] = $crit[$i]->id;
                        $data[$i]['crit_percentage'] = $crit[$i]->crit_percentage;
                        $data[$i]['status'] = "Not Yet Score";
                    }
                }
                $dataLength = count($data);
                // return $data;
                return view('qualification.showCritsForAsexual',compact('tti_id','quali_id','crit', 'id', 'title', 'data', 'dataLength'));
            }
            if($status == 1)
            {
                for($i = 0; $i <= $arrLength-1; $i++)
                {
                    $ifAlreadyScore = ScoreFeed::where('quali_id',$quali_id)
                        ->where('feed_crit_id', $crit[$i]->id)
                        ->where('con_id', $id)
                        ->first();
                    if ($ifAlreadyScore != '')
                    {
                        $data[$i]['crit_name'] = $crit[$i]->crit_name;
                        $data[$i]['quali_id'] = $crit[$i]->quali_id;
                        $data[$i]['id'] = $crit[$i]->id;
                        $data[$i]['crit_percentage'] = $crit[$i]->crit_percentage;
                        $data[$i]['status'] = "Already Score";
                    }
                    else
                    {
                        $data[$i]['crit_name'] = $crit[$i]->crit_name;
                        $data[$i]['quali_id'] = $crit[$i]->quali_id;
                        $data[$i]['id'] = $crit[$i]->id;
                        $data[$i]['crit_percentage'] = $crit[$i]->crit_percentage;
                        $data[$i]['status'] = "Not Yet Score";
                    }
                }
                $dataLength = count($data);
                // return $data;
                return view('qualification.showCritsForAsexual',compact('tti_id','quali_id','crit', 'id', 'title', 'data', 'dataLength'));
            }
        }
    }

   

    public function scoreForAsexual($id, $quali_id, $tti_id, $crit_id)
    {
        // dd($quali_id);
        if ($quali_id == 1) //ASEXUAL
        {
            
            $getAsexualGuidlines = GuidelineAsexual::where('asexual_crit_id', $crit_id)->get();
            return view('qualification.scoreForAsexual',compact('tti_id','quali_id','crit_id', 'id', 'getAsexualGuidlines'));
        }
        if ($quali_id == 2) //FEED
        {
            
            $getAsexualGuidlines = GuidelineFeed::where('feed_crit_id', $crit_id)->get();
            // dd($getAsexualGuidlines);
            return view('qualification.scoreForAsexual',compact('tti_id','quali_id','crit_id', 'id', 'getAsexualGuidlines'));
        }
        
    }

    public function showScore($id, $quali_id, $tti_id, $crit_id)
    {
        // dd($quali_id);
        if ($quali_id == 1) //ASEXUAL
        {
            
            $getAsexualGuidlines = GuidelineAsexual::where('asexual_crit_id', $crit_id)->get();
            return view('qualification.showScore',compact('tti_id','quali_id','crit_id', 'id', 'getAsexualGuidlines'));
        }
        if ($quali_id == 2) //FEED
        {
            $getAsexualGuidlines = ScoreFeed::join('criteria_feeds', 'criteria_feeds.id', 'score_feeds.feed_crit_id')
                ->join('guideline_feeds', 'guideline_feeds.id', 'score_feeds.feed_quide_id')
                ->where('score_feeds.feed_crit_id', $crit_id)
                ->where('score_feeds.con_id', $id)
                ->get();

            return view('qualification.showScore',compact('tti_id','quali_id','crit_id', 'id', 'getAsexualGuidlines'));
        }
        
    }

    public function submitScoreAsexual($tti_id, $quali_id, $crit_id, $id, Request $request)
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
        if ($quali_id == 1) //Asexual
        {

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
        }
        if ($quali_id == 2) // FEED
        {
            // return $crit_id; 
            for($i=1; $i <= $arrLength; $i++)
            {
                $datas = array();
                $datas['quali_id'] = $quali_id;
                $datas['feed_crit_id'] = $crit_id;
                $datas['feed_quide_id'] = $guideAsexualId[$i];
                $datas['user_id'] = Auth::user()->id;
                $datas['con_id'] = $id;
                $datas['total'] = $scoreTotal;
                $datas['score'] = $scoreAsexual[$i];

                DB::table('score_feeds')->insert($datas);
            }
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
