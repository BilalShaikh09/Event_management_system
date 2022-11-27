<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8',
            'password_confirmation'=>'same:password'
        ]);

        Login::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>md5($request['password'])
        ]);

        return view('welcome');
    }
}
