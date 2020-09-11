<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Region;
use App\Http\Resources\RegionResource;
class RegionController extends Controller

{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::all();
        $regions = RegionResource::collection($regions);
        return response()->json([
        	'regions' => $regions
        ]);
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
             
        ]);
    
        
        $region = new region;
        $region->name = request('name');
        $region->save();

        return redirect()->route('region.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $region = Region::find($id);
        $region = RegionResource::make($region);
        return response()->json([
        	'region' => $region
        ]);
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
           
        ]);
         
        
        $region = region::find(request('edit_id'));
        $region->name = request('edit_name');
        $region->save();

        return redirect()->route('region.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = region::find($id);
        $region->delete();
        return redirect()->route('region.index');

    }
}


