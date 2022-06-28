<?php

namespace App\Http\Controllers;

use App\Models\{Qualification, Contestant, Institutions, CriteriaAsexual, GuidelineAsexual, ScoreFeed, CriteriaFeed, User, GuidelineFeed,ScoreAsexual,CriteriaKnapsack,GuidelineKnapsack,ScoreKnapsack,CriteriaBaking,Guidelinebaking,ScoreBaking,CriteriaCooking,GuidelineCooking,ScoreCooking,CriteriaRestaurant,GuidelineRestaurant,ScoreRestaurant,CriteriaPatisserie,GuidelinePatisserie,ScorePatisserie};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;
use Auth;
use DB;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($quali_id)
    {
        $getQuali = Qualification::where('id', $quali_id)->first();
        $tti = Institutions::get();


        $getContestant = Contestant::join('institutions','institutions.id','contestants.tti_id')
                    ->where('quali_id',$quali_id)
                    ->get()
                    ->keyBy('tti_name');

        
        return view('qualification.index', compact('getQuali', 'getContestant', 'tti'));
    }

    public function feedsGenerateTopTen($quali_id)
    {
        $getTTIQuali = Contestant::join('institutions','institutions.id','contestants.tti_id')
            ->where('quali_id',$quali_id)
            ->get()
            ->keyBy('tti_name');

        $judgeTTI = User::with('roles')
            ->where('id','!=',1)
            ->where('quali_id',$quali_id)
            ->get();

        $countTTI = count($judgeTTI);


        if($quali_id == 1)
        {
            return "ASEXUAL NI SIYA";
        }
        if($quali_id == 2)
        {
            $criteria = CriteriaFeed::where('quali_id',$quali_id)->get();
            $countCrits = count($criteria);
            $countAllGuidelineFeed = 0;
            for($i = 0; $i < $countCrits; $i++)
            {
                $getGuideline = GuidelineFeed::where('feed_crit_id', $criteria[$i]->id)->get();
                $countGuideline = count($getGuideline);
                $countAllGuidelineFeed = $countAllGuidelineFeed + $countGuideline;
            }

            $countContestant = 0;

            foreach($judgeTTI as $judgeTTI)
            {
                $getContestant = Contestant::join('institutions','institutions.id','contestants.tti_id')
                    ->where('quali_id',$quali_id)
                    ->where('tti_id', '!=', $judgeTTI->tti_id)
                    ->get();
                
                $countCon = count($getContestant);
                $countContestant = $countContestant + $countCon;
            }
            $total = $countContestant * $countAllGuidelineFeed;

            $generateTopTen = ScoreFeed::where('quali_id', $quali_id)
                    ->get();
            $countScoreFeed = count($generateTopTen);


            if($total == $countScoreFeed)
            {
                $generateTopTen = ScoreFeed::where('quali_id', $quali_id)
                    ->orderBy('overAllTotal', 'desc')
                    ->get()
                    ->take(3)
                    ->keyBy('overAllTotal');

                dd($generateTopTen);
            }
            else
            {
                return redirect()->back()->with('error','There are Contestant in this Qualification that are not yet scored.');
            }
          
        }

        



       
       
    }

    public function contestantScore(Request $request)
    {
        $validated = $request->validate([
            'con_name' => 'required',
            'con_age' => 'required',
            'con_gender' => 'required',
        ]);
        $con = new Contestant();
        $con->con_name=$request->con_name;
        $con->con_age=$request->con_age;
        $con->con_gender=$request->con_gender;
        $con->tti_id = $request->tti_id;
        $con->quali_id = $request->quali_id;
        if( $request->file('con_image') != null){
            $picture = $request->file('con_image');
            $fileName = time() . '.' . $picture->getClientOriginalExtension();
            $img = Image::make($picture->getRealPath());
            $img->stream();
            $url = Storage::disk('public')->put('uploads/contestant', $picture);
            $con->con_image = $url;
        }
        $con->save();
        return redirect()->back()->with('success','Successfully Created Contestant!!');
    }

    public function contestantShow($tti_id, $quali_id)
    {
        $getJudge = User::where('tti_id','!=', $tti_id)->get();
        $countJudge = count($getJudge);
        $getCo=Contestant::where('tti_id',$tti_id)
            ->where('quali_id',$quali_id)
            ->get();
        $countContestant = count($getCo);

        if($quali_id == 1) // ASEXUAL
        {
            // echo "<pre>";
            // print_r("NAA KAS ASEXUAL");
            // echo "</pre>";
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
            $overAllTotal = $totalOfJudgeAndGuideline*$countContestant;

            $getScoreContestantPerTTIAndQuali = ScoreAsexual::join('contestants', 'contestants.id', 'score_asexuals.con_id')
                ->where('contestants.tti_id', $tti_id)
                ->where('score_asexuals.quali_id', $quali_id)
                ->get();
            $countScoreContestantPerTTIAndQuali = count($getScoreContestantPerTTIAndQuali);

            
            if($countScoreContestantPerTTIAndQuali == $overAllTotal)
            {
                $status = 1;
                return view('qualification._appendContestant',compact('getCo','tti_id','quali_id', 'status'));
            }
            else
            {
                $status = 0;
                return view('qualification._appendContestant',compact('getCo','tti_id','quali_id', 'status'));
            }
        }
        if($quali_id == 2) // FEED
        {
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
            $overAllTotal = $totalOfJudgeAndGuideline*$countContestant;

            $getScoreContestantPerTTIAndQuali = ScoreFeed::join('contestants', 'contestants.id', 'score_feeds.con_id')
                ->where('contestants.tti_id', $tti_id)
                ->where('score_feeds.quali_id', $quali_id)
                ->get();
            $countScoreContestantPerTTIAndQuali = count($getScoreContestantPerTTIAndQuali);

            
            if($countScoreContestantPerTTIAndQuali == $overAllTotal)
            {
                $status = 1;
                return view('qualification._appendContestant',compact('getCo','tti_id','quali_id', 'status'));
            }
            else
            {
                $status = 0;
                return view('qualification._appendContestant',compact('getCo','tti_id','quali_id', 'status'));
            }
        }
        if($quali_id == 3) // KNAPSACK
        {
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
            $overAllTotal = $totalOfJudgeAndGuideline*$countContestant;

            $getScoreContestantPerTTIAndQuali = ScoreKnapsack::join('contestants', 'contestants.id', 'score_knapsacks.con_id')
                ->where('contestants.tti_id', $tti_id)
                ->where('score_knapsacks.quali_id', $quali_id)
                ->get();
            $countScoreContestantPerTTIAndQuali = count($getScoreContestantPerTTIAndQuali);

            
            if($countScoreContestantPerTTIAndQuali == $overAllTotal)
            {
                $status = 1;
                return view('qualification._appendContestant',compact('getCo','tti_id','quali_id', 'status'));
            }
            else
            {
                $status = 0;
                return view('qualification._appendContestant',compact('getCo','tti_id','quali_id', 'status'));
            }
        }
        if($quali_id == 4) // BAKING
        {
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
            $overAllTotal = $totalOfJudgeAndGuideline*$countContestant;

            $getScoreContestantPerTTIAndQuali = ScoreBaking::join('contestants', 'contestants.id', 'score_bakings.con_id')
                ->where('contestants.tti_id', $tti_id)
                ->where('score_bakings.quali_id', $quali_id)
                ->get();
            $countScoreContestantPerTTIAndQuali = count($getScoreContestantPerTTIAndQuali);

            
            if($countScoreContestantPerTTIAndQuali == $overAllTotal)
            {
                $status = 1;
                return view('qualification._appendContestant',compact('getCo','tti_id','quali_id', 'status'));
            }
            else
            {
                $status = 0;
                return view('qualification._appendContestant',compact('getCo','tti_id','quali_id', 'status'));
            }
        }
        if($quali_id == 5) // Cooking
        {
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
            $overAllTotal = $totalOfJudgeAndGuideline*$countContestant;

            $getScoreContestantPerTTIAndQuali = ScoreCooking::join('contestants', 'contestants.id', 'score_cookings.con_id')
                ->where('contestants.tti_id', $tti_id)
                ->where('score_cookings.quali_id', $quali_id)
                ->get();
            $countScoreContestantPerTTIAndQuali = count($getScoreContestantPerTTIAndQuali);

            
            if($countScoreContestantPerTTIAndQuali == $overAllTotal)
            {
                $status = 1;
                return view('qualification._appendContestant',compact('getCo','tti_id','quali_id', 'status'));
            }
            else
            {
                $status = 0;
                return view('qualification._appendContestant',compact('getCo','tti_id','quali_id', 'status'));
            }
        }
        if($quali_id == 6) // RESTAURANT
        {
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
            $overAllTotal = $totalOfJudgeAndGuideline*$countContestant;

            $getScoreContestantPerTTIAndQuali = ScoreRestaurant::join('contestants', 'contestants.id', 'score_restaurants.con_id')
                ->where('contestants.tti_id', $tti_id)
                ->where('score_restaurants.quali_id', $quali_id)
                ->get();
            $countScoreContestantPerTTIAndQuali = count($getScoreContestantPerTTIAndQuali);

            
            if($countScoreContestantPerTTIAndQuali == $overAllTotal)
            {
                $status = 1;
                return view('qualification._appendContestant',compact('getCo','tti_id','quali_id', 'status'));
            }
            else
            {
                $status = 0;
                return view('qualification._appendContestant',compact('getCo','tti_id','quali_id', 'status'));
            }
        }
        if($quali_id == 7) // PATISSERIE
        {
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
            $overAllTotal = $totalOfJudgeAndGuideline*$countContestant;

            $getScoreContestantPerTTIAndQuali = ScorePatisserie::join('contestants', 'contestants.id', 'score_patisseries.con_id')
                ->where('contestants.tti_id', $tti_id)
                ->where('score_patisseries.quali_id', $quali_id)
                ->get();
            $countScoreContestantPerTTIAndQuali = count($getScoreContestantPerTTIAndQuali);

            
            if($countScoreContestantPerTTIAndQuali == $overAllTotal)
            {
                $status = 1;
                return view('qualification._appendContestant',compact('getCo','tti_id','quali_id', 'status'));
            }
            else
            {
                $status = 0;
                return view('qualification._appendContestant',compact('getCo','tti_id','quali_id', 'status'));
            }
        }
        if($quali_id == 8) // WELDING
        {
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
            $overAllTotal = $totalOfJudgeAndGuideline*$countContestant;

            $getScoreContestantPerTTIAndQuali = ScoreWelding::join('contestants', 'contestants.id', 'score_weldings.con_id')
                ->where('contestants.tti_id', $tti_id)
                ->where('score_weldings.quali_id', $quali_id)
                ->get();
            $countScoreContestantPerTTIAndQuali = count($getScoreContestantPerTTIAndQuali);

            
            if($countScoreContestantPerTTIAndQuali == $overAllTotal)
            {
                $status = 1;
                return view('qualification._appendContestant',compact('getCo','tti_id','quali_id', 'status'));
            }
            else
            {
                $status = 0;
                return view('qualification._appendContestant',compact('getCo','tti_id','quali_id', 'status'));
            }
        }
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
     * @param  \App\Models\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function show(Qualification $qualification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function edit(Qualification $qualification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qualification $qualification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qualification $qualification)
    {
        //
    }
}
