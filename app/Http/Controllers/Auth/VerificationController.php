<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class VerificationController extends Controller
{
    public function verify($name, $token){
        $user = DB::table('users')->where('name', $name)->first();
        if($user->confirmation_token === $token){
            DB::table('users')->where('name', $name)->update(['confirmed' => true]);
            
            return redirect()->route('login');
        } else {
            $user->confirmed = false;
        }
        
    }
}
