<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RemindPasswordController extends Controller
{
    public function index($prop){
        return view('auth.reminderpassword', ['prop' => $prop]);
    }
    public function store(Request $request, $prop){        
        $this->validate($request, [
            'password'=>'required|confirmed',
        ]);

        $user = User::where('name', Crypt::decrypt($prop))->first();

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('login');
    }
}
