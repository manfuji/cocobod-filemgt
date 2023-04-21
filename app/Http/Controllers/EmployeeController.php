<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use File;
use DB;
use App\Http\Resources\EmployeeResource;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('pages.employees',compact('departments'));
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
       $filename = null;

        if($request->file('profile')){
            $file = $request->file('profile');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('private/Image'),$filename);  
        }
        $request->merge(['image' => $filename]);
        
        if($emp =   Employee::create($request->all())){
            return back()->with('success','Employee created!');
        }else{
            return back()->with('error','Please try again');
        }
       
       

    }

    public function fetchEmployees(){
        $employees = Employee::all();
        $departments = Department::all();
        return json_encode([
            "data" => EmployeeResource::collection($employees),
            'department' => $departments]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = DB::table('employees')
        ->select('employees.id','first_name','last_name','other_name','email','image','department','departments.name')
        ->join('departments','employees.department','=','departments.id')
        ->where('employees.id','=',$id)
        ->get();
        return $employee;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $employee = Employee::find($id);
        $departments = Department::all();
        return compact('employee','departments');
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
        
        $employee = Employee::find($id);
        $filename = null;
        if($request->file('profile')){
            $file = $request->file('profile');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('private/Image'),$filename);     
        }
        File::delete($employee->image);
        $request->merge(['image' => $filename]);
        // dd($request->all());
        if($employee->update($request->all())){
            return back()->with('success','Employee Updated!');
        }else{
            return back()->with('error','Please try again');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
