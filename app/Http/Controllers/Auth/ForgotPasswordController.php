<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordReminder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }
    public function index(){
        return view('auth.forgotpassword');
    }
    public function store(Request $request){
        $this->validate($request, [
            'email'=>'required',
        ]); 

        $user = DB::table('users')->where('email', $request->email)->first();

        if($user){
            Mail::to($request->email)->send(new PasswordReminder($user->name));
            return redirect()->route('email');
        }else{
            return back()->with('status', 'User not found');
        }
    }
}
