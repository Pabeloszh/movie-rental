<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UpdateUserController extends Controller
{
    public function index(){
        return view('auth.updateuser');
    }
    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required|max:255',
            'email'=>['required', Rule::unique('users')->ignore(auth()->user())],
            'password'=>'confirmed',
        ]);

        auth()->user()->name = $request->name;
        auth()->user()->email = $request->email;
        if(Hash::check($request->old_password, auth()->user()->password)){
            auth()->user()->password = Hash::make($request->password);
        }
        auth()->user()->save();

        return back();
    }

}
