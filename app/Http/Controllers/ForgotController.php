<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;

class ForgotController extends Controller
{
    public function forgot(){
        return view('Password.email');
    }

    public function reset(){
        return view('Password.reset');
    }

    public function verifyemail(Request $request){
        $request->validate([
            'email'=>'required | email'
        ]);

        $user = Login::where('email',$request['email'])->first();
        if($user->email == null){
            $message = 'this email id is not exite';
            return $message;
        }
        else{
            return view('Password.reset',compact('user'));
        }
        
    }
}
