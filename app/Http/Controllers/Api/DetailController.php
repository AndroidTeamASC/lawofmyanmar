<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Detail;
use App\Http\Resources\DetailResource;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Detail::all();
        $details = DetailResource::collection($details);
        return response()->json([
        	'details' => $details
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
            'name' => 'required',
            'chapter_id'=> 'required',
        ]);
    
        
        $detail = new Detail;
        $detail->name = request('name');
        $detail->chapter_id = request('chapter_id');
        $detail->save();

        return redirect()->route('detail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Detail::find($id);
        $detail = DetailResource::make($detail);
        return response()->json([
        	'detail' => $detail
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     *z
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
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
            'edit_name' => 'required',
            // 'image'=> 'required',
            'edit_chapter_id'  => 'required',
        ]);
         
        
        $detail = detail::find(request('edit_id'));
        $detail->name = request('edit_name');
        $detail->chapter_id = request('edit_chapter_id');
        $detail->save();

        return redirect()->route('detail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = detail::find($id);
        $detail->delete();
        return redirect()->route('detail.index');

    }

    public function detailLaw(Request $request)
    {
        if($chapter_id = request('chapter_id')){
            $details = DB::table('details')
                        ->where('details.chapter_id','=',$chapter_id)
                        ->select('details.*')
                        ->get();

        }
    
        $details = DetailResource::collection($details);
            return response()->json([
                'details' => $details
            ],200);
    }
}
