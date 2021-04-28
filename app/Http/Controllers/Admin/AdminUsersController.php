<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function index(){
        $users = User::where('admin', false)->get();

        if(auth()->user()->admin === false){
            return redirect()->route('home');
        }

        return view('admin.adminuser', [
            'users'=>$users,
        ]);
    }
    public function ban($user){
        $banned = User::where('id', $user)->first();
        $banned->banned = !$banned->banned;
        $banned->save();

        return back();
    }
}
