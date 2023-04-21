<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Http\Resources\UserResource;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        // dd($employees);
        return view('pages.user',compact('employees'));
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

    public function fetchUsers(){
        $users = User::all();
        return json_encode([
            "data" => UserResource::collection($users)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // if($request->employe)
        $employee = Employee::find($request->employee);
        $user = new User;
        $user->name = $employee->first_name.' '.$employee->last_name;
        $user->email = $employee->email;
        $user->role = $request->role;
        $user->password = bcrypt('123456');
        
        $user->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function profile(){
        // dd(Auth::user()->email);
         $profile = Employee::where('email',Auth::user()->email)->first();
        // return $profile;
         return view('pages.profile',compact('profile'));
    }

    public function updateProfile(Request $request,$id){
        $emp = Employee::find($id);
        $emp->first_name = $request->firstname;
        $emp->last_name = $request->lastname;
        $emp->other_name = $request->othername;
        $emp->email = $request->email;
        $emp->password = bcrypt($request->password);
        $filename = null;
        if($request->file('profile')){
            $file = $request->file('profile');
            $filename = date('YmdHi').$file->getClientOriginalName();
             $file->move(public_path('private/Image'),$filename);

        }
        $emp->image = $filename;

        $emp->update();
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
