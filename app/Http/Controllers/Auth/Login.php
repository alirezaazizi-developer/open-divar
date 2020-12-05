<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{

    public function __invoke()
    {
        $userInfo = request()->validate([
            'phone' =>  'required|max:13',
            'pass'  =>  'required',
        ]);

        if(auth()->attempt(['phone' => $userInfo['phone'], 'password' => $userInfo['pass'] ])){

            return Auth::user()->createToken('Personal Client')->accessToken;
        }
        dd('fa');
    }
}
