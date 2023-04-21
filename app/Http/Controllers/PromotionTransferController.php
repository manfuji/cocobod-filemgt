<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\PromotionTransfer;
use File;
use App\Http\Resources\PromotionTransferResource;

class PromotionTransferController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return view('pages.promotiontransfer',compact('employees'));
    }

    public function store(Request $request){
        $filename = null;
        if($request->file('documents')){
            $file = $request->file('documents');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('private/documents'),$filename);
            
        }
        
        $request->merge(['document' => $filename]);
        if($appraisal = PromotionTransfer::create($request->all())){
            return back()->with('success','Record created!');
        }else{
            return back()->with('error','Please try again');
        }
        
    }

    public function fetchpromo(){
        $employees = PromotionTransfer::all();
        return json_encode([
            "data" => PromotionTransferResource::collection($employees)]);
    }

    public function edit($id)
    {
        $promoTransfer = PromotionTransfer::find($id);
        return $promoTransfer;
    }

    public function update(Request $request, $id)
    {
        $promoTransfer = PromotionTransfer::find($id);
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
        $promoTransfer = PromotionTransfer::find($id);
        File::delete($promoTransfer->document);
        $promoTransfer->delete();
    }

}
