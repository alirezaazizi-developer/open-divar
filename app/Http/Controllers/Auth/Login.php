<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Responser;
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

            return response(Responser::success([
                'access' => Auth::user()->createToken('Personal Client')->accessToken
            ]));
        }

        return Responser::error();
    }
}
