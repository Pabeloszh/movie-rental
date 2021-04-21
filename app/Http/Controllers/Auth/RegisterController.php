<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailConfirmation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required|unique:users,name|max:255',
            'email'=>'required|email|unique:users,email|max:255',
            'password'=>'required|confirmed',
        ]);

        $token = Str::random(20);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'admin' => $request->admin ? 1 : 0 ?? 0,
            'confirmed' => 0,
            'confirmation_token' => $token,
        ]);

        Mail::to($request->email)->send(new EmailConfirmation($request->name, $token));

        return redirect()->route('email');
    }
}
