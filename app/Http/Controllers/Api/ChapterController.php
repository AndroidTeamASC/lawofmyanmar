<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Chapter;
use App\Http\Resources\ChapterResource;
use Illuminate\Support\Facades\DB;

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
        $chapters = ChapterResource::collection($chapters);
	        return response()->json([
	        	'chapters' => $chapters
	        ],200);
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
            'law_id'=> 'required',
        ]);
    
        
        $chapter = new chapter;
        $chapter->chapter_no = request('chapter_no');
        $chapter->law_id = request('law_id');
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
        $chapter =  Chapter::find($id);
        $chapter = ChapterResource::make($chapter);
        return response()->json([
        	'chapter' => $chapter
        ],200);
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
            'edit_chapter_no' => 'required',
            // 'image'=> 'required',
            'edit_law_id'  => 'required',
        ]);
         
        
        $chapter = Chapter::find(request('edit_id'));
        $chapter->chapter_no = request('edit_chapter_no');
        $chapter->law_id = request('edit_law_id');
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

    public function searchChapterbyId(Request $request)
    {
        if($law_id = request('law_id')){
            $chapters = DB::table('chapters')
                        ->where('chapters.law_id','=',$law_id)
                        ->select('chapters.*')
                        ->get();

        }
    
        $chapters = ChapterResource::collection($chapters);
            return response()->json([
                'chapters' => $chapters
            ],200);
    }
}