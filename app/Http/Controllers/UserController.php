<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        
        $data = $this->validate($request,$this->getRules());
        $checkData = Auth::attempt(['email' => $data['email'], 'password' => $data['pass']]);
        if($checkData){
            $request->session()->put('user',$data['email']);
            return redirect('/products');
        }else{
            return 'no bad';
        }
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function getRules()
    {
        return [
            'email' => 'required|email',
            'pass'  => 'required',
        ];
    }

    // REgister

    public function register()
    {
        return view('register');
    }

    public function post_register(Request $request)
    {
        $register = new User;
        $register->name = $request->name;
        $register->email = $request->email;
        $register->password = Hash::make($request->password);
        $register->save();

        return redirect('/login')->with('success','User Add Successfuly');
    }

}
