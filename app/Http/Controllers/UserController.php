<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserContoller extends Controller
{
    public function openDashboard(){
        $userId = auth()->user()->id;
        dd($userId);
        //$userdName = auth()->user()->name;
        //return view('dashboard');
    }
}
