<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getLogin(){
        return view('main.login');
    }

    public function apiLogin(Request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!auth()->attempt($data)) return response(['error' => 'Invalid Credentials'], 403);

        $token = auth()->user()->createToken('API Token')->accessToken;

        return response([
            'message' => 'Success',
            'data' => auth()->user(),
            'access_token' => $token
        ]);
    }

    public function postLogin(Request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember_me = $request->has('remember_me') ? true : false;

        if(!auth()->attempt($data, $remember_me)) return redirect()->back()->withErrors(['login' => 'Invalid Credentials']);

        return redirect()->route('dashboard');  
    }

    public function getRegister(){
        return view('main.register');
    }

    public function apiRegister(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $data['password'] = bcrypt($request->password);
        $data['role_id'] = 2;

        $user = User::create($data);
        $token = $user->createToken('API Token')->accessToken;

        return response([
            'message' => 'Success',
            'data' => $user,
            'access_token' => $token
        ]);
    }

    public function postRegister(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirmation' => 'same:password'
        ],[
            'password_confirmation.same' => 'The password confirmation does not match.'
        ]);

        $data['password'] = bcrypt($request->password);
        $data['role_id'] = 2;

        User::create($data);

        return redirect()->route('login')->withErrors(['message' => 'You have successfully registred an account!']);
    }

    public function logout(Request $request){
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
