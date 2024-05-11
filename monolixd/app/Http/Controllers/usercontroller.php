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
}