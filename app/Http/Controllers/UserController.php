<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Validate;

class UserController extends Controller
{
    public function show_login_form(){
        return view('user-login');
    }
    
    public function show_register_form(){
        return view('user-register');
    }

    public function register_save(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' =>'required|confirmed'
        ]);

          // Create user with hashed password
        $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        ]);

        if($user){
            return redirect()->route('user.login_form')->with('success', 'User registration succesfull.');
        }
        // Handling the case where user creation fails
        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }

    public function login_validate(Request $request){
        $validator =  Validator::make($request->all(),[
            'email' => 'required|email',
            'password' =>'required'
        ]);
        if($validator->passes()){
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                return redirect()->route('home')->with('success','Logged in successfully');
            }
            else{
                return redirect()->route('user.login_form')->with('error','The provided credentials do not match our records.');

            }
            }
        else{
                    return redirect()->route('user.login_form')
                        ->withInput()
                        ->withErrors($validator);
            }
       
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

}
