<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordReminder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
    public function index(){
        return view('auth.forgotpassword');
    }
    public function store(Request $request){
        $user = DB::table('users')->where('email', $request->email)->first();

        if($user){
            Mail::to($request->email)->send(new PasswordReminder($user->name));
        }else{
            dd('error');
        }
        return redirect()->route('login');
    }
}
