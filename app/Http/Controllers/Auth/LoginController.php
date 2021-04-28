<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }
    public function index(){
        return view('auth.login');
    }
    public function store(Request $request){
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(!auth()->attempt(['email' => $request->email, 'password' => $request->password, 'confirmed' => 1, 'banned' => 0])){
            return back()->with('status', 'Your account has been invalid');
        }
        
        return redirect()->route('home');

    }
}
