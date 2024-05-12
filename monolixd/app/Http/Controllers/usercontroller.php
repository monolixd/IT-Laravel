<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function showData(){
        $users = User::all();

        return view('userData',compact('users'));
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('user.data');
    }

    public function showEdit($id){
        $users = User::find($id);
        return view('update',compact('users'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
        ]);

        $users = User::find($id);
        $users ->fill($request->except('password'));
        $users ->save();

        return redirect()->route('user.data')->with(['success'=>'user has been updated!']);
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|min:8|max:13',
        ]);

        $user = new User;
        $user->fill($request->all());
        $user->save();

        return back()->with(['success' => 'user has been saved!']);
    }   
}