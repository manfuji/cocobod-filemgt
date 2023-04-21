<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Training;
use File;
use App\Http\Resources\TrainingResource;


class TrainingController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return view('pages.training',compact('employees'));
    }

    public function store(Request $request){
        $filename = null;
        if($request->file('documents')){
            $file = $request->file('documents');
            $filename = date('YmdHi').$file->getClientOriginalName();
             $file->move(public_path('private/documents'),$filename);

        }
        $request->merge(['document' => $filename]);
        if($appraisal = Training::create($request->all())){
            return back()->with('success','Record created!');
        }else{
            return back()->with('error','Please try again');
        }
        
    }

    public function edit($id)
    {
        $promoTransfer = Training::find($id);
        return $promoTransfer;
    }

    public function fetchTrainings(){
        $employees = Training::all();
        return json_encode([
            "data" => TrainingResource::collection($employees)]);
    }

    public function update(Request $request, $id)
    {
        $training = Training::find($id);
        if($request->file('documents')){
            $file = $request->file('documents');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('private/documents'),$filename);
             File::delete($training->document);
             $request->merge(['document' => $filename]);
        }
       
        
        $training->update($request->all());
    }

    public function destroy($id)
    {
        $training = Training::find($id);
        File::delete($training->document);
        $training->delete();
    }
}
