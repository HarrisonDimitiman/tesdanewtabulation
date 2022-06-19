<?php

namespace App\Http\Controllers;

use App\Models\{Qualification, Contestant, Institutions, CriteriaAsexual, GuidelineAsexual};
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
        $getContestant=Contestant::join('institutions','institutions.id','contestants.tti_id')
                    ->where('quali_id',$quali_id)
                    ->get()
                    ->keyBy('tti_name');
        return view('qualification.index', compact('getQuali', 'getContestant', 'tti'));
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
        $getCo=Contestant::where('tti_id',$tti_id)->where('quali_id',$quali_id)->get();
        return view('qualification._appendContestant',compact('getCo','tti_id','quali_id'));
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
