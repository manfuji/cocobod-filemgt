<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Application;
use App\Models\Qualification;
use App\Http\Resources\ApplicationResource;
use File;

class ApplicationController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return view('pages.application',compact('employees'));
    }

    public function store(Request $request){
        if($request->file('documents')){
            $file = $request->file('documents');
            $filename = date('YmdHi').$file->getClientOriginalName();
             $file->move(public_path('private/documents'),$filename);

        }
        $request->merge(['document' => $filename]);
        // $qualification = Qualification::create($request->all());
        if($appraisal = Application::create($request->all())){
            return back()->with('success','Record created!');
        }else{
            return back()->with('error','Please try again');
        }
        
    }

    public function edit($id)
    {
        $application = Application::find($id);
        return $application;
    }

    public function update(Request $request, $id)
    {
        $medical = Application::find($id);
        if($request->file('documents')){
            $file = $request->file('documents');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('private/documents'),$filename);
             File::delete($medical->document);
             $request->merge(['document' => $filename]);
        }
       
        if($medical->update($request->all())){
            return back()->with('success','Record Updated!');
        }else{
            return back()->with('error','Please try again');
        }
        
    }

    public function fetchApplication(){
        $employees = Application::all();
        return json_encode([
            "data" => ApplicationResource::collection($employees)]);
    }

    public function destroy($id)
    {
        $medical = Application::find($id);
        File::delete($medical->documents);
        $medical->delete();
    }
}
