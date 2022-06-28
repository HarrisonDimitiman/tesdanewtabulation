<?php

namespace App\Http\Controllers;

use App\Models\{ScoreAsexual, GuidelineAsexual, CriteriaAsexual, CriteriaFeed, GuidelineFeed, ScoreFeed, User, Contestant,CriteriaKnapsack,GuidelineKnapsack,ScoreKnapsack,CriteriaBaking,Guidelinebaking,ScoreBaking,CriteriaCooking,GuidelineCooking,ScoreCooking,CriteriaRestaurant,GuidelineRestaurant,ScoreRestaurant,CriteriaPatisserie,GuidelinePatisserie,ScorePatisserie};
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
            $title = "ASEXUAL";
            $crit = CriteriaAsexual::where('quali_id',$quali_id)->get();
            $arrLength = count($crit);

            for($i = 0; $i <= $arrLength-1; $i++)
            {
                $ifAlreadyScore = ScoreAsexual::where('quali_id',$quali_id)
                    ->where('asexual_crit_id', $crit[$i]->id)
                    ->where('con_id', $id)
                    ->where('score_asexuals.user_id', Auth::user()->id)
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
                    $ifAlreadyScore = ScoreAsexual::where('quali_id',$quali_id)
                        ->where('asexual_crit_id', $crit[$i]->id)
                        ->where('con_id', $id)
                        ->where('score_asexuals.user_id', Auth::user()->id)
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
                return view('qualification.showCritsForAsexual',compact('tti_id','quali_id','crit', 'id', 'title', 'data', 'dataLength'));
            }
            if($status == 1)
            {
                for($i = 0; $i <= $arrLength-1; $i++)
                {
                    $ifAlreadyScore = ScoreAsexual::where('quali_id',$quali_id)
                        ->where('asexual_crit_id', $crit[$i]->id)
                        ->where('con_id', $id)
                        ->where('score_asexuals.user_id', Auth::user()->id)
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
                    ->where('score_feeds.user_id', Auth::user()->id)
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
                        ->where('score_feeds.user_id', Auth::user()->id)
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
                return view('qualification.showCritsForAsexual',compact('tti_id','quali_id','crit', 'id', 'title', 'data', 'dataLength'));
            }
            if($status == 1)
            {
                for($i = 0; $i <= $arrLength-1; $i++)
                {
                    $ifAlreadyScore = ScoreFeed::where('quali_id',$quali_id)
                        ->where('feed_crit_id', $crit[$i]->id)
                        ->where('con_id', $id)
                        ->where('score_feeds.user_id', Auth::user()->id)
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
        if ($quali_id == 3) //KNAPSACK
        {
            $title = "KNAPSACK";
            $crit = CriteriaKnapsack::where('quali_id',$quali_id)->get();
            $arrLength = count($crit);

            for($i = 0; $i <= $arrLength-1; $i++)
            {
                $ifAlreadyScore = ScoreKnapsack::where('quali_id',$quali_id)
                    ->where('knapsack_crit_id', $crit[$i]->id)
                    ->where('con_id', $id)
                    ->where('score_knapsacks.user_id', Auth::user()->id)
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
                    $ifAlreadyScore = ScoreKnapsack::where('quali_id',$quali_id)
                        ->where('knapsack_crit_id', $crit[$i]->id)
                        ->where('con_id', $id)
                        ->where('score_knapsacks.user_id', Auth::user()->id)
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
                return view('qualification.showCritsForAsexual',compact('tti_id','quali_id','crit', 'id', 'title', 'data', 'dataLength'));
            }
            if($status == 1)
            {
                for($i = 0; $i <= $arrLength-1; $i++)
                {
                    $ifAlreadyScore = ScoreKnapsack::where('quali_id',$quali_id)
                        ->where('knapsack_crit_id', $crit[$i]->id)
                        ->where('con_id', $id)
                        ->where('score_knapsacks.user_id', Auth::user()->id)
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
        if ($quali_id == 4) //BAKING
        {
            $title = "BAKING";
            $crit = CriteriaBaking::where('quali_id',$quali_id)->get();
            $arrLength = count($crit);

            for($i = 0; $i <= $arrLength-1; $i++)
            {
                $ifAlreadyScore = ScoreBaking::where('quali_id',$quali_id)
                    ->where('baking_crit_id', $crit[$i]->id)
                    ->where('con_id', $id)
                    ->where('score_bakings.user_id', Auth::user()->id)
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
                    $ifAlreadyScore = ScoreBaking::where('quali_id',$quali_id)
                        ->where('baking_crit_id', $crit[$i]->id)
                        ->where('con_id', $id)
                        ->where('score_bakings.user_id', Auth::user()->id)
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
                return view('qualification.showCritsForAsexual',compact('tti_id','quali_id','crit', 'id', 'title', 'data', 'dataLength'));
            }
            if($status == 1)
            {
                for($i = 0; $i <= $arrLength-1; $i++)
                {
                    $ifAlreadyScore = ScoreBaking::where('quali_id',$quali_id)
                        ->where('baking_crit_id', $crit[$i]->id)
                        ->where('con_id', $id)
                        ->where('score_bakings.user_id', Auth::user()->id)
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
        if ($quali_id == 5) //COOKING
        {
            $title = "COOKING";
            $crit = CriteriaCooking::where('quali_id',$quali_id)->get();
            $arrLength = count($crit);

            for($i = 0; $i <= $arrLength-1; $i++)
            {
                $ifAlreadyScore = ScoreCooking::where('quali_id',$quali_id)
                    ->where('cooking_crit_id', $crit[$i]->id)
                    ->where('con_id', $id)
                    ->where('score_cookings.user_id', Auth::user()->id)
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
                    $ifAlreadyScore = ScoreCooking::where('quali_id',$quali_id)
                        ->where('cooking_crit_id', $crit[$i]->id)
                        ->where('con_id', $id)
                        ->where('score_cookings.user_id', Auth::user()->id)
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
                return view('qualification.showCritsForAsexual',compact('tti_id','quali_id','crit', 'id', 'title', 'data', 'dataLength'));
            }
            if($status == 1)
            {
                for($i = 0; $i <= $arrLength-1; $i++)
                {
                    $ifAlreadyScore = ScoreCooking::where('quali_id',$quali_id)
                        ->where('cooking_crit_id', $crit[$i]->id)
                        ->where('con_id', $id)
                        ->where('score_cookings.user_id', Auth::user()->id)
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
        if ($quali_id == 6) //RESTAURANT
        {
            $title = "RESTAURANT";
            $crit = CriteriaRestaurant::where('quali_id',$quali_id)->get();
            $arrLength = count($crit);

            for($i = 0; $i <= $arrLength-1; $i++)
            {
                $ifAlreadyScore = ScoreRestaurant::where('quali_id',$quali_id)
                    ->where('restaurant_crit_id', $crit[$i]->id)
                    ->where('con_id', $id)
                    ->where('score_restaurants.user_id', Auth::user()->id)
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
                    $ifAlreadyScore = ScoreRestaurant::where('quali_id',$quali_id)
                        ->where('restaurant_crit_id', $crit[$i]->id)
                        ->where('con_id', $id)
                        ->where('score_restaurants.user_id', Auth::user()->id)
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
                return view('qualification.showCritsForAsexual',compact('tti_id','quali_id','crit', 'id', 'title', 'data', 'dataLength'));
            }
            if($status == 1)
            {
                for($i = 0; $i <= $arrLength-1; $i++)
                {
                    $ifAlreadyScore = ScoreRestaurant::where('quali_id',$quali_id)
                        ->where('restaurant_crit_id', $crit[$i]->id)
                        ->where('con_id', $id)
                        ->where('score_restaurants.user_id', Auth::user()->id)
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
        if ($quali_id == 7) //PATISSERIE
        {
            $title = "PATISSERIE";
            $crit = CriteriaPatisserie::where('quali_id',$quali_id)->get();
            $arrLength = count($crit);

            for($i = 0; $i <= $arrLength-1; $i++)
            {
                $ifAlreadyScore = ScorePatisserie::where('quali_id',$quali_id)
                    ->where('patisserie_crit_id', $crit[$i]->id)
                    ->where('con_id', $id)
                    ->where('score_patisseries.user_id', Auth::user()->id)
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
                    $ifAlreadyScore = ScorePatisserie::where('quali_id',$quali_id)
                        ->where('patisserie_crit_id', $crit[$i]->id)
                        ->where('con_id', $id)
                        ->where('score_patisseries.user_id', Auth::user()->id)
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
                return view('qualification.showCritsForAsexual',compact('tti_id','quali_id','crit', 'id', 'title', 'data', 'dataLength'));
            }
            if($status == 1)
            {
                for($i = 0; $i <= $arrLength-1; $i++)
                {
                    $ifAlreadyScore = ScorePatisserie::where('quali_id',$quali_id)
                        ->where('patisserie_crit_id', $crit[$i]->id)
                        ->where('con_id', $id)
                        ->where('score_patisseries.user_id', Auth::user()->id)
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
        if ($quali_id == 8) //WELDING
        {
            $title = "WELDING";
            $crit = CriteriaWelding::where('quali_id',$quali_id)->get();
            $arrLength = count($crit);

            for($i = 0; $i <= $arrLength-1; $i++)
            {
                $ifAlreadyScore = ScoreWelding::where('quali_id',$quali_id)
                    ->where('welding_crit_id', $crit[$i]->id)
                    ->where('con_id', $id)
                    ->where('score_weldings.user_id', Auth::user()->id)
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
                    $ifAlreadyScore = ScoreWelding::where('quali_id',$quali_id)
                        ->where('welding_crit_id', $crit[$i]->id)
                        ->where('con_id', $id)
                        ->where('score_weldings.user_id', Auth::user()->id)
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
                return view('qualification.showCritsForAsexual',compact('tti_id','quali_id','crit', 'id', 'title', 'data', 'dataLength'));
            }
            if($status == 1)
            {
                for($i = 0; $i <= $arrLength-1; $i++)
                {
                    $ifAlreadyScore = ScoreWelding::where('quali_id',$quali_id)
                        ->where('welding_crit_id', $crit[$i]->id)
                        ->where('con_id', $id)
                        ->where('score_weldings.user_id', Auth::user()->id)
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
        if ($quali_id == 3) //KNAPSACK
        {
            
            $getAsexualGuidlines = GuidelineKnapsack::where('knapsack_crit_id', $crit_id)->get();
            // dd($getAsexualGuidlines);
            return view('qualification.scoreForAsexual',compact('tti_id','quali_id','crit_id', 'id', 'getAsexualGuidlines'));
        }
        if ($quali_id == 4) //BAKING
        {
            
            $getAsexualGuidlines = GuidelineBaking::where('baking_crit_id', $crit_id)->get();
            // dd($getAsexualGuidlines);
            return view('qualification.scoreForAsexual',compact('tti_id','quali_id','crit_id', 'id', 'getAsexualGuidlines'));
        }
        if ($quali_id == 5) //COOKING
        {
            
            $getAsexualGuidlines = GuidelineCooking::where('cooking_crit_id', $crit_id)->get();
            // dd($getAsexualGuidlines);
            return view('qualification.scoreForAsexual',compact('tti_id','quali_id','crit_id', 'id', 'getAsexualGuidlines'));
        }
        if ($quali_id == 6) //RESTUARANT
        {
            
            $getAsexualGuidlines = GuidelineRestaurant::where('restaurant_crit_id', $crit_id)->get();
            // dd($getAsexualGuidlines);
            return view('qualification.scoreForAsexual',compact('tti_id','quali_id','crit_id', 'id', 'getAsexualGuidlines'));
        }
        if ($quali_id == 7) //PATISSERIE
        {
            
            $getAsexualGuidlines = GuidelinePatisserie::where('patisserie_crit_id', $crit_id)->get();
            // dd($getAsexualGuidlines);
            return view('qualification.scoreForAsexual',compact('tti_id','quali_id','crit_id', 'id', 'getAsexualGuidlines'));
        }
        if ($quali_id == 8) //WELDING
        {
            
            $getAsexualGuidlines = GuidelineWelding::where('welding_crit_id', $crit_id)->get();
            // dd($getAsexualGuidlines);
            return view('qualification.scoreForAsexual',compact('tti_id','quali_id','crit_id', 'id', 'getAsexualGuidlines'));
        }
        
    }

    public function showScore($id, $quali_id, $tti_id, $crit_id)
    {
        // dd($quali_id);
        if ($quali_id == 1) //ASEXUAL
        {
            
            $getAsexualGuidlines = ScoreAsexual::join('criteria_asexuals', 'criteria_asexuals.id', 'score_asexuals.asexual_crit_id')
                ->join('guideline_asexuals', 'asexual_crit_id.id', 'score_asexuals.asexual_quide_id')
                ->where('score_asexuals.feed_crit_id', $crit_id)
                ->where('score_asexuals.con_id', $id)
                ->get();

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
        if ($quali_id == 3) //KNAPSACK
        {
            $getAsexualGuidlines = ScoreKnapsack::join('criteria_knapsacks', 'criteria_knapsacks.id', 'score_knapsacks.knapsack_crit_id')
                ->join('guideline_knapsacks', 'guideline_knapsacks.id', 'score_knapsacks.knapsack_quide_id')
                ->where('score_knapsacks.knapsack_crit_id', $crit_id)
                ->where('score_knapsacks.con_id', $id)
                ->get();

            return view('qualification.showScore',compact('tti_id','quali_id','crit_id', 'id', 'getAsexualGuidlines'));
        }
        if ($quali_id == 4) //BAKING
        {
            $getAsexualGuidlines = ScoreBaking::join('criteria_bakings', 'criteria_bakings.id', 'score_bakings.baking_crit_id')
                ->join('guideline_bakings', 'guideline_bakings.id', 'score_bakings.baking_quide_id')
                ->where('score_bakings.baking_crit_id', $crit_id)
                ->where('score_bakings.con_id', $id)
                ->get();

            return view('qualification.showScore',compact('tti_id','quali_id','crit_id', 'id', 'getAsexualGuidlines'));
        }
        if ($quali_id == 5) //COOKING
        {
            $getAsexualGuidlines = ScoreCooking::join('criteria_cookings', 'criteria_cookings.id', 'score_cookings.cooking_crit_id')
                ->join('guideline_cookings', 'guideline_cookings.id', 'score_cookings.cooking_quide_id')
                ->where('score_cookings.cooking_crit_id', $crit_id)
                ->where('score_cookings.con_id', $id)
                ->get();

            return view('qualification.showScore',compact('tti_id','quali_id','crit_id', 'id', 'getAsexualGuidlines'));
        }
        if ($quali_id == 6) //RESTAURANT
        {
            $getAsexualGuidlines = ScoreRestaurant::join('criteria_restaurants', 'criteria_restaurants.id', 'score_restaurants.restaurant_crit_id')
                ->join('guideline_restaurants', 'guideline_restaurants.id', 'score_restaurants.restaurant_quide_id')
                ->where('score_restaurants.restaurant_crit_id', $crit_id)
                ->where('score_restaurants.con_id', $id)
                ->get();

            return view('qualification.showScore',compact('tti_id','quali_id','crit_id', 'id', 'getAsexualGuidlines'));
        }
        if ($quali_id == 7) //PATISSERIE
        {
            $getAsexualGuidlines = ScorePatisserie::join('criteria_patisseries', 'criteria_patisseries.id', 'score_patisseries.patisserie_crit_id')
                ->join('guideline_patisseries', 'guideline_patisseries.id', 'score_patisseries.patisseries_quide_id')
                ->where('score_patisseries.patisserie_crit_id', $crit_id)
                ->where('score_patisseries.con_id', $id)
                ->get();

            return view('qualification.showScore',compact('tti_id','quali_id','crit_id', 'id', 'getAsexualGuidlines'));
        }
        if ($quali_id == 8) //WELDING
        {
            $getAsexualGuidlines = ScoreWelding::join('criteria_weldings', 'criteria_weldings.id', 'score_weldings.welding_crit_id')
                ->join('guideline_weldings', 'guideline_weldings.id', 'score_weldings.welding_quide_id')
                ->where('score_weldings.welding_crit_id', $crit_id)
                ->where('score_weldings.con_id', $id)
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

        $getJudge = User::where('tti_id','!=', $tti_id)->get();
        $countJudge = count($getJudge);
 
        if ($quali_id == 1) //Asexual
        {

            $criteria = CriteriaAsexual::where('quali_id',$quali_id)->get();
            $countCrits = count($criteria);
            $countAllGuidelineFeed = 0;
            for($i = 0; $i < $countCrits; $i++)
            {
                $getGuideline = GuidelineAsexual::where('asexual_crit_id', $criteria[$i]->id)->get();
                $countGuideline = count($getGuideline);
                $countAllGuidelineFeed = $countAllGuidelineFeed + $countGuideline;
            }
            
            $totalOfJudgeAndGuideline = $countAllGuidelineFeed*$countJudge;

            
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

            $getScoreContestantPerTTIAndQuali = ScoreAsexual::join('contestants', 'contestants.id', 'score_asexuals.con_id')
                ->where('contestants.tti_id', $tti_id)
                ->where('score_asexuals.quali_id', $quali_id)
                ->where('score_asexuals.con_id', $id)
                ->get();
            $countScoreContestantPerTTIAndQuali = count($getScoreContestantPerTTIAndQuali);
            
            if($totalOfJudgeAndGuideline == $countScoreContestantPerTTIAndQuali)
            {
                $sumOfAllTotalPerContestant = 0;
                for($i = 0; $i < $countScoreContestantPerTTIAndQuali; $i++)
                {
                    $sumOfAllTotalPerContestant = $sumOfAllTotalPerContestant + $getScoreContestantPerTTIAndQuali[$i]->total;
                }
                $data = array();
                $data['overAllTotal'] = $sumOfAllTotalPerContestant;

                DB::table('score_asexuals')->where('con_id', $id)->update($data);
            }
        }
        if ($quali_id == 2) // FEED
        {
            // return $crit_id; 
            $criteria = CriteriaFeed::where('quali_id',$quali_id)->get();
            $countCrits = count($criteria);
            $countAllGuidelineFeed = 0;
            for($i = 0; $i < $countCrits; $i++)
            {
                $getGuideline = GuidelineFeed::where('feed_crit_id', $criteria[$i]->id)->get();
                $countGuideline = count($getGuideline);
                $countAllGuidelineFeed = $countAllGuidelineFeed + $countGuideline;
            }
            
            $totalOfJudgeAndGuideline = $countAllGuidelineFeed*$countJudge;

            
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

            $getScoreContestantPerTTIAndQuali = ScoreFeed::join('contestants', 'contestants.id', 'score_feeds.con_id')
                ->where('contestants.tti_id', $tti_id)
                ->where('score_feeds.quali_id', $quali_id)
                ->where('score_feeds.con_id', $id)
                ->get();
            $countScoreContestantPerTTIAndQuali = count($getScoreContestantPerTTIAndQuali);
            
            if($totalOfJudgeAndGuideline == $countScoreContestantPerTTIAndQuali)
            {
                $sumOfAllTotalPerContestant = 0;
                for($i = 0; $i < $countScoreContestantPerTTIAndQuali; $i++)
                {
                    $sumOfAllTotalPerContestant = $sumOfAllTotalPerContestant + $getScoreContestantPerTTIAndQuali[$i]->total;
                }
                $data = array();
                $data['overAllTotal'] = $sumOfAllTotalPerContestant;

                DB::table('score_feeds')->where('con_id', $id)->update($data);
            }
            
        }
        if ($quali_id == 3) // KNAPSACK
        {
            // return $crit_id; 
            $criteria = CriteriaKnapsack::where('quali_id',$quali_id)->get();
            $countCrits = count($criteria);
            $countAllGuidelineFeed = 0;
            for($i = 0; $i < $countCrits; $i++)
            {
                $getGuideline = GuidelineKnapsack::where('knapsack_crit_id', $criteria[$i]->id)->get();
                $countGuideline = count($getGuideline);
                $countAllGuidelineFeed = $countAllGuidelineFeed + $countGuideline;
            }
            
            $totalOfJudgeAndGuideline = $countAllGuidelineFeed*$countJudge;

            
            for($i=1; $i <= $arrLength; $i++)
            {
                $datas = array();
                $datas['quali_id'] = $quali_id;
                $datas['knapsack_crit_id'] = $crit_id;
                $datas['knapsack_quide_id'] = $guideAsexualId[$i];
                $datas['user_id'] = Auth::user()->id;
                $datas['con_id'] = $id;
                $datas['total'] = $scoreTotal;
                $datas['score'] = $scoreAsexual[$i];

                DB::table('score_knapsacks')->insert($datas);
            }

            $getScoreContestantPerTTIAndQuali = ScoreFeed::join('contestants', 'contestants.id', 'score_knapsacks.con_id')
                ->where('contestants.tti_id', $tti_id)
                ->where('score_knapsacks.quali_id', $quali_id)
                ->where('score_knapsacks.con_id', $id)
                ->get();
            $countScoreContestantPerTTIAndQuali = count($getScoreContestantPerTTIAndQuali);
            
            if($totalOfJudgeAndGuideline == $countScoreContestantPerTTIAndQuali)
            {
                $sumOfAllTotalPerContestant = 0;
                for($i = 0; $i < $countScoreContestantPerTTIAndQuali; $i++)
                {
                    $sumOfAllTotalPerContestant = $sumOfAllTotalPerContestant + $getScoreContestantPerTTIAndQuali[$i]->total;
                }
                $data = array();
                $data['overAllTotal'] = $sumOfAllTotalPerContestant;

                DB::table('score_knapsacks')->where('con_id', $id)->update($data);
            }
            
        }
        if ($quali_id == 4) // BAKING
        {
            // return $crit_id; 
            $criteria = CriteriaBaking::where('quali_id',$quali_id)->get();
            $countCrits = count($criteria);
            $countAllGuidelineFeed = 0;
            for($i = 0; $i < $countCrits; $i++)
            {
                $getGuideline = GuidelineBaking::where('baking_crit_id', $criteria[$i]->id)->get();
                $countGuideline = count($getGuideline);
                $countAllGuidelineFeed = $countAllGuidelineFeed + $countGuideline;
            }
            
            $totalOfJudgeAndGuideline = $countAllGuidelineFeed*$countJudge;

            
            for($i=1; $i <= $arrLength; $i++)
            {
                $datas = array();
                $datas['quali_id'] = $quali_id;
                $datas['baking_crit_id'] = $crit_id;
                $datas['baking_quide_id'] = $guideAsexualId[$i];
                $datas['user_id'] = Auth::user()->id;
                $datas['con_id'] = $id;
                $datas['total'] = $scoreTotal;
                $datas['score'] = $scoreAsexual[$i];

                DB::table('score_bakings')->insert($datas);
            }

            $getScoreContestantPerTTIAndQuali = ScoreBaking::join('contestants', 'contestants.id', 'score_bakings.con_id')
                ->where('contestants.tti_id', $tti_id)
                ->where('score_bakings.quali_id', $quali_id)
                ->where('score_bakings.con_id', $id)
                ->get();
            $countScoreContestantPerTTIAndQuali = count($getScoreContestantPerTTIAndQuali);
            
            if($totalOfJudgeAndGuideline == $countScoreContestantPerTTIAndQuali)
            {
                $sumOfAllTotalPerContestant = 0;
                for($i = 0; $i < $countScoreContestantPerTTIAndQuali; $i++)
                {
                    $sumOfAllTotalPerContestant = $sumOfAllTotalPerContestant + $getScoreContestantPerTTIAndQuali[$i]->total;
                }
                $data = array();
                $data['overAllTotal'] = $sumOfAllTotalPerContestant;

                DB::table('score_bakings')->where('con_id', $id)->update($data);
            }
            
        }
        if ($quali_id == 5) // COOKING
        {
            // return $crit_id; 
            $criteria = CriteriaCooking::where('quali_id',$quali_id)->get();
            $countCrits = count($criteria);
            $countAllGuidelineFeed = 0;
            for($i = 0; $i < $countCrits; $i++)
            {
                $getGuideline = GuidelineCooking::where('cooking_crit_id', $criteria[$i]->id)->get();
                $countGuideline = count($getGuideline);
                $countAllGuidelineFeed = $countAllGuidelineFeed + $countGuideline;
            }
            
            $totalOfJudgeAndGuideline = $countAllGuidelineFeed*$countJudge;

            
            for($i=1; $i <= $arrLength; $i++)
            {
                $datas = array();
                $datas['quali_id'] = $quali_id;
                $datas['cooking_crit_id'] = $crit_id;
                $datas['cooking_quide_id'] = $guideAsexualId[$i];
                $datas['user_id'] = Auth::user()->id;
                $datas['con_id'] = $id;
                $datas['total'] = $scoreTotal;
                $datas['score'] = $scoreAsexual[$i];

                DB::table('score_cookings')->insert($datas);
            }

            $getScoreContestantPerTTIAndQuali = ScoreCooking::join('contestants', 'contestants.id', 'score_cookings.con_id')
                ->where('contestants.tti_id', $tti_id)
                ->where('score_cookings.quali_id', $quali_id)
                ->where('score_cookings.con_id', $id)
                ->get();
            $countScoreContestantPerTTIAndQuali = count($getScoreContestantPerTTIAndQuali);
            
            if($totalOfJudgeAndGuideline == $countScoreContestantPerTTIAndQuali)
            {
                $sumOfAllTotalPerContestant = 0;
                for($i = 0; $i < $countScoreContestantPerTTIAndQuali; $i++)
                {
                    $sumOfAllTotalPerContestant = $sumOfAllTotalPerContestant + $getScoreContestantPerTTIAndQuali[$i]->total;
                }
                $data = array();
                $data['overAllTotal'] = $sumOfAllTotalPerContestant;

                DB::table('score_cookings')->where('con_id', $id)->update($data);
            }
            
        }
        if ($quali_id == 6) // RESTAURANT
        {
            // return $crit_id; 
            $criteria = CriteriaRestaurant::where('quali_id',$quali_id)->get();
            $countCrits = count($criteria);
            $countAllGuidelineFeed = 0;
            for($i = 0; $i < $countCrits; $i++)
            {
                $getGuideline = GuidelineRestaurant::where('restaurant_crit_id', $criteria[$i]->id)->get();
                $countGuideline = count($getGuideline);
                $countAllGuidelineFeed = $countAllGuidelineFeed + $countGuideline;
            }
            
            $totalOfJudgeAndGuideline = $countAllGuidelineFeed*$countJudge;

            
            for($i=1; $i <= $arrLength; $i++)
            {
                $datas = array();
                $datas['quali_id'] = $quali_id;
                $datas['restaurant_crit_id'] = $crit_id;
                $datas['restaurant_quide_id'] = $guideAsexualId[$i];
                $datas['user_id'] = Auth::user()->id;
                $datas['con_id'] = $id;
                $datas['total'] = $scoreTotal;
                $datas['score'] = $scoreAsexual[$i];

                DB::table('score_restaurants')->insert($datas);
            }

            $getScoreContestantPerTTIAndQuali = ScoreRestaurant::join('contestants', 'contestants.id', 'score_restaurants.con_id')
                ->where('contestants.tti_id', $tti_id)
                ->where('score_restaurants.quali_id', $quali_id)
                ->where('score_restaurants.con_id', $id)
                ->get();
            $countScoreContestantPerTTIAndQuali = count($getScoreContestantPerTTIAndQuali);
            
            if($totalOfJudgeAndGuideline == $countScoreContestantPerTTIAndQuali)
            {
                $sumOfAllTotalPerContestant = 0;
                for($i = 0; $i < $countScoreContestantPerTTIAndQuali; $i++)
                {
                    $sumOfAllTotalPerContestant = $sumOfAllTotalPerContestant + $getScoreContestantPerTTIAndQuali[$i]->total;
                }
                $data = array();
                $data['overAllTotal'] = $sumOfAllTotalPerContestant;

                DB::table('score_restaurants')->where('con_id', $id)->update($data);
            }
            
        }
        if ($quali_id == 7) // PATISSERIE
        {
            // return $crit_id; 
            $criteria = CriteriaPatisserie::where('quali_id',$quali_id)->get();
            $countCrits = count($criteria);
            $countAllGuidelineFeed = 0;
            for($i = 0; $i < $countCrits; $i++)
            {
                $getGuideline = GuidelinePatisserie::where('patisserie_crit_id', $criteria[$i]->id)->get();
                $countGuideline = count($getGuideline);
                $countAllGuidelineFeed = $countAllGuidelineFeed + $countGuideline;
            }
            
            $totalOfJudgeAndGuideline = $countAllGuidelineFeed*$countJudge;

            
            for($i=1; $i <= $arrLength; $i++)
            {
                $datas = array();
                $datas['quali_id'] = $quali_id;
                $datas['patisserie_crit_id'] = $crit_id;
                $datas['patisserie_quide_id'] = $guideAsexualId[$i];
                $datas['user_id'] = Auth::user()->id;
                $datas['con_id'] = $id;
                $datas['total'] = $scoreTotal;
                $datas['score'] = $scoreAsexual[$i];

                DB::table('score_patisseries')->insert($datas);
            }

            $getScoreContestantPerTTIAndQuali = ScorePatisserie::join('contestants', 'contestants.id', 'score_patisseries.con_id')
                ->where('contestants.tti_id', $tti_id)
                ->where('score_patisseries.quali_id', $quali_id)
                ->where('score_patisseries.con_id', $id)
                ->get();
            $countScoreContestantPerTTIAndQuali = count($getScoreContestantPerTTIAndQuali);
            
            if($totalOfJudgeAndGuideline == $countScoreContestantPerTTIAndQuali)
            {
                $sumOfAllTotalPerContestant = 0;
                for($i = 0; $i < $countScoreContestantPerTTIAndQuali; $i++)
                {
                    $sumOfAllTotalPerContestant = $sumOfAllTotalPerContestant + $getScoreContestantPerTTIAndQuali[$i]->total;
                }
                $data = array();
                $data['overAllTotal'] = $sumOfAllTotalPerContestant;

                DB::table('score_patisseries')->where('con_id', $id)->update($data);
            }
            
        }
        if ($quali_id == 8) // WELDING
        {
            // return $crit_id; 
            $criteria = CriteriaWelding::where('quali_id',$quali_id)->get();
            $countCrits = count($criteria);
            $countAllGuidelineFeed = 0;
            for($i = 0; $i < $countCrits; $i++)
            {
                $getGuideline = GuidelineWelding::where('welding_crit_id', $criteria[$i]->id)->get();
                $countGuideline = count($getGuideline);
                $countAllGuidelineFeed = $countAllGuidelineFeed + $countGuideline;
            }
            
            $totalOfJudgeAndGuideline = $countAllGuidelineFeed*$countJudge;

            
            for($i=1; $i <= $arrLength; $i++)
            {
                $datas = array();
                $datas['quali_id'] = $quali_id;
                $datas['welding_crit_id'] = $crit_id;
                $datas['welding_quide_id'] = $guideAsexualId[$i];
                $datas['user_id'] = Auth::user()->id;
                $datas['con_id'] = $id;
                $datas['total'] = $scoreTotal;
                $datas['score'] = $scoreAsexual[$i];

                DB::table('score_weldings')->insert($datas);
            }

            $getScoreContestantPerTTIAndQuali = ScoreWelding::join('contestants', 'contestants.id', 'score_weldings.con_id')
                ->where('contestants.tti_id', $tti_id)
                ->where('score_weldings.quali_id', $quali_id)
                ->where('score_weldings.con_id', $id)
                ->get();
            $countScoreContestantPerTTIAndQuali = count($getScoreContestantPerTTIAndQuali);
            
            if($totalOfJudgeAndGuideline == $countScoreContestantPerTTIAndQuali)
            {
                $sumOfAllTotalPerContestant = 0;
                for($i = 0; $i < $countScoreContestantPerTTIAndQuali; $i++)
                {
                    $sumOfAllTotalPerContestant = $sumOfAllTotalPerContestant + $getScoreContestantPerTTIAndQuali[$i]->total;
                }
                $data = array();
                $data['overAllTotal'] = $sumOfAllTotalPerContestant;

                DB::table('score_weldings')->where('con_id', $id)->update($data);
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
