<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    use ApiResponseTrait;

    public function loginStore(Request $request)
    {

        $validator = Validator::make($request->all() , [
            'password' => 'required|min:6|max:255',
            'email' => 'required|email|exists:users'
        ]);

        if ($validator->fails()){
            return $this->errorMessage($validator->messages() , 422);
        }

        if(Auth::attempt(['email' => $request->email , 'password' => $request->password])){
            $user = Auth::user();
            $accessToken = $user->createToken($user->email)->plainTextToken;
            $data = [
                'user' => $user,
                'accessToken' => $accessToken,
            ];
            return $this->successMessage($data, 200 , "شما با موفقیت لاگین شدید");

        }else{
            return $this->errorMessage("ایمیل یا رمز عبور وارد شده اشتباه است" , 422);
        }

    }


}
