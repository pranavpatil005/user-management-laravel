<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class UserController extends Controller{


    function index(Request $request){
    $data= user::all();
    
    return view('index',compact('data'));
    }

    function add(Request $request){

    return view('add');
    }


    function store(Request $request){
        $validatedData = $request->validate([
              'name'   => 'required|string|max:255',
        'email'  => 'required|email|unique:users,email',
        'number' => 'required|digits:10',
        ]);

        $user = new  User;
        $user->name =$request->name;
         $user->email =$request->email;
          $user->phone_number =$request->number;
           $user->save();


        session()->flash('success',"User added successfully");
        return redirect()->route('index');


    
    }




    function edit($id){

    $id = base64_decode($id);
    $Data = User::findorfail($id);

     return view('edit',compact('Data'));
    }
 
   
   function update(Request $request, $id)
{
    $id = base64_decode($id);

    $validatedData = $request->validate([
        'name'   => 'required|string|max:255',
        // ✅ exclude current user id for unique email check
        'email'  => 'required|email|unique:users,email,' . $id,
        'number' => 'required|digits:10',
    ]);

    $Data = User::findOrFail($id);
    $Data->name = $request->name;
    $Data->email = $request->email;
    $Data->phone_number = $request->number;
    $Data->save();

    session()->flash('success', "User updated successfully");
    return redirect()->route('index');
}


public function destroy($id)
{
    $id = base64_decode($id);
    $user = User::findOrFail($id);
    $user->delete();

    session()->flash('success', "User deleted successfully!");
    return redirect()->route('index');
}



}