<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function addDeposit(){
        return view('home.addDeposit');
    }

    public function updateDeposit(Request $request){

        $user = Auth::user();

        $request->validate([
            "deposit"=>"required|max:4"
        ]);

        $user->deposit = $user->deposit + $request->deposit;
        $user->save();

        return redirect(route('welcome'));
    }


}
