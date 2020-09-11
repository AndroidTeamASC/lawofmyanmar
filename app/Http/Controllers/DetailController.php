<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chapter;
use App\Detail;

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
        $chapters = Chapter::all();
        return view('detail.index',compact('details','chapters'));
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
}
