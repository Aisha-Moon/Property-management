<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login(){
        $data['header_title']='Login';
        return view('auth.login',$data);
    }
    public function register(){
        $data['header_title']='Register';
        return view('auth.register',$data);
    }
    public function register_post(Request $request){
        $user = request()->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|string|same:password',
        ]);
        $user=new User();
        $user->name=trim($request->name);
        $user->last_name=trim($request->last_name);
        $user->email=trim($request->email);
        $user->password=Hash::make($request->password);
        $user->mobile=trim($request->mobile);
        $user->address=trim($request->address);
        $user->remember_token=Str::random(50);
        $user->status=0;
        $user->is_admin=0;
        $user->save();
        return redirect('/')->with('success','Registration successful');

    }
    public function login_post(Request $request){
        $remember=!empty($request->remember) ? true : false;
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$remember)){
            if(Auth::user()->is_admin==0){
                return redirect('user/dashboard');
            }
            else if(Auth::user()->is_admin==1){
                return redirect('admin/dashboard');

            }
            else if(Auth::user()->is_admin==2){
                return redirect('vendor/dashboard');

            }else{
                return redirect()->back()->with('error','Please enter a valid email address');
            }
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
