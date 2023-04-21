<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\MedicalResource;
use App\Models\Medical;
use App\Models\Employee;
use File;

class MedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('pages.medicals',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    public function fetchMedicals(){
        $employees = Medical::all();
        return json_encode([
            "data" => MedicalResource::collection($employees)]);
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

        if($request->file('document')){
            $file = $request->file('document');
            $filename = date('YmdHi').$file->getClientOriginalName();
             $file->move(public_path('private/documents'),$filename);

        }
        $request->merge(['documents' => $filename]);
    
        
        if($medical =   Medical::create($request->all())){
            return back()->with('success','Record created!');
        }else{
            return back()->with('error','Please try again');
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medical = Medical::find($id);
        return $medical;
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
        $filename = null;
        // dd($request->all());
        $medical = Medical::find($id);
        if($request->file('document')){
            $file = $request->file('document');
            $filename = date('YmdHi').$file->getClientOriginalName();
             $file->move(public_path('private/documents'),$filename);
             File::delete($medical->documents);
             
        }
        if($filename !==null) $request->merge(['documents' => $filename]);
       
        // dd($request->all());
        
        if($medical->update($request->all())){
            return back()->with('success','Record Updated!');
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
        $medical = Medical::find($id);
        File::delete($medical->documents);
        $medical->delete();
    }
}
