<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Appraisal;
use File;
use App\Http\Resources\AppraisalResource;

class AppraisalController extends Controller
{
    public function index(){
        $employees = Employee::all();
        
        return view('pages.appraisal',compact('employees'));
    }

    public function store(Request $request){
        $filename = null;
        if($request->file('documents')){
            $file = $request->file('documents');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('private/documents'),$filename);
            
            //  $data = $request->all();
            //  $data['document'] = $filename;
        }
        
        $request->merge(['document' => $filename]);
        // return $request->all();
        if($appraisal = Appraisal::create($request->all())){
            return back()->with('success','Record created!');
        }else{
            return back()->with('error','Please try again');
        }
        
    }

    public function fetchAppraisal(){
        $employees = Appraisal::all();
        return json_encode([
            "data" => AppraisalResource::collection($employees)]);
    }

    public function edit($id){
        $appraisal = Appraisal::find($id);
        return $appraisal;
    }

    public function update(Request $request, $id)
    {
        $appraisal = Appraisal::find($id);
        $filename = null;
        if($request->file('documents')){
            $file = $request->file('documents');
            $filename = date('YmdHi').$file->getClientOriginalName();
             $file->move(public_path('private/documents'),$filename);
            
             File::delete($appraisal->document);
        }
        $request->merge(['document' => $filename]);
        if($appraisal->update($request->all())){
            return back()->with('success','Record Updated!');
        }else{
            return back()->with('error','Please try again');
        }
        
    }

    public function destroy($id)
    {
        $appraisal = Appraisal::find($id);
        File::delete($appraisal->document);
        $appraisal->delete();
    }
}
