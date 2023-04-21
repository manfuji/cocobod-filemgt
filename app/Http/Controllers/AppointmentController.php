<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Appointment;
use File;
use App\Http\Resources\AppointmentResource;

class AppointmentController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return view('pages.appointment',compact('employees'));
    }

    public function store(Request $request){
        $filename = null;
        if($request->file('document')){
            $file = $request->file('document');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('private/documents'),$filename);
            
        }
        
        $request->merge(['documents' => $filename]);
        //  dd($request->all());
        if($appraisal = Appointment::create($request->all())){
            return back()->with('success','Record created!');
        }else{
            return back()->with('error','Please try again');
        }
         
    }

    public function fetchAppointments(){
        $employees = Appointment::all();
        return json_encode([
            "data" => AppointmentResource::collection($employees)]);
    }

    public function edit($id)
    {
        $appointment = Appointment::find($id);
        return $appointment;
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        if($request->file('document')){
            $file = $request->file('document');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('private/documents'),$filename);
            File::delete($appointment->documents);
        }
        $request->merge(['documents' => $filename]);
        if($appointment->update($request->all())){
            return back()->with('success','Record Updated!');
        }else{
            return back()->with('error','Please try again');
        }
        
    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        File::delete($appointment->documents);
        $appointment->delete();
    }
    

}
