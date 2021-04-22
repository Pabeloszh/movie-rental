<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RemindPasswordController extends Controller
{
    public function index($prop){
        return view('auth.reminderpassword', ['prop' => $prop]);
    }
    public function store(Request $request, $prop){        
        $this->validate($request, [
            'password'=>'required|confirmed',
        ]);

        $user = DB::table('users')->where('name', Crypt::decrypt($prop))->first();

        $user->password = Hash::make($request->password);

        return redirect()->route('login');
    }
}