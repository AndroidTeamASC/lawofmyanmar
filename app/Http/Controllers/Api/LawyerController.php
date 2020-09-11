<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lawyer;
use App\Http\Resources\LawyerResource;
class LawyerController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lawyers = Lawyer::all();
        $lawyers = LawyerResource::collection($lawyers);
        return response()->json([
        	'lawyers' => $lawyers
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
            'name'      => 'required',
            'address'   => 'required',
            'phone'     => 'required',
            'position'  => 'required',
            'lawyer_no' => 'required'
        ]);
    
        
        $lawyer = new lawyer;
        $lawyer->name       = request('name');
        $lawyer->address    = request('address');
        $lawyer->phone      = request('phone');
        $lawyer->position   = request('position');
        $lawyer->lawyer_no  = request('lawyer_no');
        $lawyer->save();

        return redirect()->route('lawyer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lawyer = Lawyer::find($id);
        $lawyer = LawyerResource::make($lawyer);
        return response()->json([
        	'lawyer' => $lawyer
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
            'edit_phone'    => 'required',
            'edit_lawyer_no'=> 'required',
            'edit_position' => 'required'
        ]);
         
        
        $lawyer = lawyer::find(request('edit_id'));
        $lawyer->name       = request('edit_name');
        $lawyer->phone      = request('edit_phone');
        $lawyer->address    = request('edit_address');
        $lawyer->position   = request('edit_position');
        $lawyer->lawyer_no  = request('edit_lawyer_no');
        $lawyer->save();

        return redirect()->route('lawyer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lawyer = lawyer::find($id);
        $lawyer->delete();
        return redirect()->route('lawyer.index');

    }
}
