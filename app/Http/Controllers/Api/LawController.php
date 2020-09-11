<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Law;
use App\Http\Resources\LawResource;
use Illuminate\Support\Facades\DB;

class LawController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laws = Law::all();
        $laws = LawResource::collection($laws);
        return response()->json([
        	'laws' => $laws
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
        // dd($request);   
        $request->validate([
            'name'              => 'required',
            'type'              => 'required',
            'main'              => 'required',
            'published_date'    => 'required',
            'release_date'      => 'required',
            // 'deparment_id'      => 'required',
            'law_no'       => 'required',
            // 'region_id'         => 'required'          
        ]);
    
        
        $law = new law;
        $law->name          = request('name');
        $law->type          = request('type');
        $law->main          = request('main');
        $law->published_date= request('published_date');
        $law->release_date  = request('release_date');
        $law->department_id  = request('department');
        $law->law_type_id   = request('law_type');
        $law->region_id     = request('region_id');
        $law->law_no        = request('law_no');
        $law->save();

        return redirect()->route('law.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $law = Law::find($id);
        $law = LawResource::make($law);
        return response()->json([
        	'law' => $law
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
            'edit_name'              => 'required',
            'edit_type'              => 'required',
            'edit_main'              => 'required',
            'edit_published_date'    => 'required',
            'edit_release_date'      => 'required',
            // 'edit_deparment_id'      => 'required',
            'edit_law_no'       => 'required',
            // 'edit_region_id'         => 'required'          
        ]);
    
        
        $law =  Law::find(request('edit_id'));
        $law->name           = request('edit_name');
        $law->type           = request('edit_type');
        $law->main           = request('edit_main');
        $law->published_date = request('edit_published_date');
        $law->release_date   = request('edit_release_date');
        $law->department_id  = request('edit_department_id');
        $law->law_type_id    = request('edit_law_type_id');
        $law->region_id      = request('edit_region_id');
        $law->law_no         = request('edit_law_no');
        $law->save();

        return redirect()->route('law.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $law = Law::find($id);
        $law->delete();
        return redirect()->route('law.index');

    }

    public function filterByLawId(Request $request) 
    {
        // $department_id = request('department_id');
        if ($law_type_id = request('law_type_id') && $department_id = request('department_id')) {
           
            $laws = DB::table('laws')
                    ->where('laws.department_id','=',$department_id)
                    ->where('laws.law_type_id','=',$law_type_id)
                    ->select('laws.*')
                    ->get();
            
            
        }

        $laws = LawResource::collection($laws);
        return response()->json([
                'laws' => $laws
            ]);
    }

     public function filterByRegionId(Request $request) 
    {

        if (($department_id = request('department_id')) && ($region_id = request('region_id')) ) {
                 echo $region_id;
                 echo $department_id;
            $laws = DB::table('laws')
                    ->where('laws.region_id','=',$region_id)
                    ->where('laws.department_id','=',$department_id)
                    ->select('laws.*')
                    ->get();
            
            
        }

        $laws = LawResource::collection($laws);
        return response()->json([
                'laws' => $laws
            ]);
    }
}
