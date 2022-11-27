<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function check(Request $request){
        $request->validate([
            'email'=>'required | email',
            'password'=>'required'
        ]);
        // dd($request->all());
        $user = Login::where('email','=',$request['email'], '&&' ,'password','=',$request['password']);
        if($user != '/0')
            return view('welcome',compact('user'));
        else
        dd('none');
    }
}
