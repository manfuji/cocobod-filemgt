<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Qualification;
use File;
use App\Http\Resources\QualificationResource;


class QualificationController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return view('pages.qualification',compact('employees'));
    }

    public function fetchQualification(){
        $employees = Qualification::all();
        return json_encode([
            "data" => QualificationResource::collection($employees)]);
    }

    public function store(Request $request){
        // return $request->all();
        $filename = null;

        if($request->file('documents')){
            $file = $request->file('documents');
            $filename = date('YmdHi').$file->getClientOriginalName();
             $file->move(public_path('private/documents'),$filename);

        }
        $request->merge(['document' => $filename]);
        if($qualification = Qualification::create($request->all())){
            return back()->with('success','Record created!');
        }else{
            return back()->with('error','Please try again');
        }
        
    }

    public function edit($id)
    {
        $promoTransfer = Qualification::find($id);
        return $promoTransfer;
    }

    public function update(Request $request, $id)
    {
        $promoTransfer = Qualification::find($id);
        if($request->file('documents')){
            $file = $request->file('documents');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('private/documents'),$filename);
            File::delete($promoTransfer->document);
            $request->merge(['document' => $filename]);
        }
        
        if($promoTransfer->update($request->all())){
            return back()->with('success','Record Updated!');
        }else{
            return back()->with('error','Please try again');
        }
        
    }


    public function destroy($id)
    {
        $qualification = Qualification::find($id);
        File::delete($qualification->document);
        $qualification->delete();
    }
}
