<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Court;
use App\Http\Resources\CourtResource;

class CourtController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courts = Court::all();
        $courts = CourtResource::collection($courts);
        return response()->json([
        	'courts' => $courts
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
            'address'=> 'required',
            'phone'  => 'required' 
        ]);
    
        
        $court = new Court;
        $court->name = request('name');
        $court->address = request('address');
        $court->phone = request('phone');
        $court->save();

        return redirect()->route('court.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $court = Court::find($id);
        $court = CourtResource::make($court);
        return response()->json([
        	'court' => $court
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
            'edit_address'  => 'required',
            'edit_phone'    => 'required' 
        ]);
         
        
        $court = court::find(request('edit_id'));
        $court->name = request('edit_name');
        $court->phone = request('edit_phone');
        $court->address = request('edit_address');
        $court->save();

        return redirect()->route('court.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $court = court::find($id);
        $court->delete();
        return redirect()->route('court.index');

    }
}

