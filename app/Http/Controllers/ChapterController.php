<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chapter;
use App\Law;
class ChapterController extends Controller

{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapters = Chapter::all();
        $laws = Law::all();
        return view('chapter.index',compact('chapters','laws'));
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
        // $base_url = "http://mobile.khaingthinkyi.me/";

        $request->validate([
            'chapter_no' => 'required',
            'law_id'     => 'required',
            'section'    => 'required'   
        ]);
    
        
        $chapter = new chapter;
        $chapter->chapter_no = request('chapter_no');
        $chapter->law_id     = request('law_id');
        $chapter->section    = request('section');
        $chapter->save();

        return redirect()->route('chapter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     *z
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request);
         $request->validate([
            'edit_chapter_no'   => 'required',
            // 'image'=> 'required',
            'edit_law_id'       => 'required',
            'edit_section'      => 'required' 
        ]);
         
        
        $chapter = Chapter::find(request('edit_id'));
        $chapter->chapter_no = request('edit_chapter_no');
        $chapter->law_id     = request('edit_law_id');
        $chapter->section    = request('edit_section');
        $chapter->save();

        return redirect()->route('chapter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chapter = chapter::find($id);
        $chapter->delete();
        return redirect()->route('chapter.index');

    }
}

