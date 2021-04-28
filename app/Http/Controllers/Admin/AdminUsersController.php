<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function index(){
        $users = User::where('admin', false)->get();

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
