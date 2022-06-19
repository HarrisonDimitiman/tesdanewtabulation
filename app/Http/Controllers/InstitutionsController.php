<?php

namespace App\Http\Controllers;

use App\Models\Institutions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

class InstitutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abrv = Institutions::get(); 
        return view('institution.index', compact('abrv'));
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
        
        $validated = $request->validate([
            'tti_name' => 'required',
            'tti_abrv' => 'required',
        ]);
        $abrv = new Institutions();
        $abrv->tti_name=$request->tti_name;
        $abrv->tti_abrv=$request->tti_abrv;
        if( $request->file('tti_image') != null){
            $picture = $request->file('tti_image');
            $fileName = time() . '.' . $picture->getClientOriginalExtension();
            $img = Image::make($picture->getRealPath());
            $img->stream();
            $url = Storage::disk('public')->put('uploads/institution', $picture);
            $abrv->tti_image = $url;
        }
        $abrv->save();
        return redirect()->back()->with('success','Successfully Created Institution!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Institutions  $institutions
     * @return \Illuminate\Http\Response
     */
    public function show(Institutions $institutions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Institutions  $institutions
     * @return \Illuminate\Http\Response
     */
    public function edit(Institutions $institutions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Institutions  $institutions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institutions $institutions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Institutions  $institutions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institutions $institutions)
    {
        //
    }
}
