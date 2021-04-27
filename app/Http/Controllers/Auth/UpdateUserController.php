<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Rent;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UpdateUserController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function index(){
        return view('auth.updateuser');
    }
    public function store(Request $request){
        $this->validate($request, [
            'name'=>['required', Rule::unique('users')->ignore(auth()->user())],
            'email'=>['required', Rule::unique('users')->ignore(auth()->user())],
            'old_password'=>'required',
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
    public function destroy(){
        if(Rent::select('movie_id')->where('user_id', auth()->user()->id)->where('deleted_at', null)->get()->count() === 0){
            User::where('confirmation_token', auth()->user()->confirmation_token)->delete();
            auth()->logout();
            
            return redirect()->route('home');
        } else {
            return back()->with('status', 'You have some movies to give us back');
        }

    }

}
