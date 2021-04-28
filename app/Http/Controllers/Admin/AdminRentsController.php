<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rent;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminRentsController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function index(){
        $lenders = Rent::whereMonth('updated_at', '<',  Carbon::today()->subMonths(1))->get();

        if(auth()->user()->admin === false){
            return redirect()->route('home');
        }

        $lenders_id = [];
        foreach ($lenders as $value) {
            array_push($lenders_id, $value->user_id);
        }
        $users_rents = User::whereIn('id', $lenders_id)->with('rents')->get();

        return view('admin.adminrents', [
            'users_rents'=>$users_rents
        ]);
    }
}
