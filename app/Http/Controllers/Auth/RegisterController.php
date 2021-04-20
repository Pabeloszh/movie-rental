<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required|unique:users,name|max:255',
            'email'=>'required|email|unique:users,email|max:255',
            'password'=>'required|confirmed',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'admin' => $request->admin ? 1 : 0 ?? 0
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('home');
    }
}
