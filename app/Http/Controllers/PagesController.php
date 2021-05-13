<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }
    /*public function startSession(Request $request){
        $credential = $request->only('nickname','password');
       
        if( Auth::attempt($credential)){
            return 'si';
        }else{
            return 'no';
        }
    }*/
}
