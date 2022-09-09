<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login.user');
    }

    public function handleLogin(Request  $request ){

     $this->validate($request, [
      'email' => ['bail', 'requer', 'string' ,'email'],
      'password' => ['bail', 'requer', 'string' ],
      
     ]);

       $user = User::where('email', $request->email)->first();
       if(!$user || !Hash::check($request->password, $user->password ?? "" ) ){

        return redirect()->back()->withErrors(['email'=> 'information not correct']);
       }

       Auth::LOGIN($user);

        return redirect()->route('login.user');

    }


}
