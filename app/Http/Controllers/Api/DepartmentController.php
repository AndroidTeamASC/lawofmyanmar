<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Department;
use App\Http\Resources\DepartmentResource;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        $departments = DepartmentResource::collection($departments);
        return response()->json([
        	'departments' => $departments
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
            'image'=> 'required',
            'url'  => 'required' 
        ]);
         if($request->hasfile('image')){
            $image=$request->file('image');
            $name=$image->getClientOriginalName();
            $image->move(public_path().
                '/image/',$name);
            $image='/image/'.$name;
        }
        
        $department = new Department;
        $department->name = request('name');
        $department->url = request('url');
        $department->image = $image;
        $department->save();

        return redirect()->route('department.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);
        $department = DepartmentResource::make($department);
        return response()->json([
        	'department' => $department
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
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
            'edit_url'  => 'required' 
        ]);
         if($request->hasfile('image')){
            $image=$request->file('image');
            $name=$image->getClientOriginalName();
            $image->move(public_path().
                '/image/',$name);
            $image='/image/'.$name;
        }else{
            $image = request('old_image');
        }
        
        $department = Department::find(request('edit_id'));
        $department->name = request('edit_name');
        $department->url = request('edit_url');
        $department->image = $image;
        $department->save();

        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->route('department.index');

    }
}
