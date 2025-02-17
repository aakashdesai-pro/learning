<?php

namespace App\Http\Controllers;

use App\Events\SendOtpForLogin;
use App\Events\SendOtpForRegistration;
use App\Events\SendOtpToForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(){
        //validation
        //data store
        //otp store

        $mobile = 8980373630;
        $message = "Your OTP is for login is 1234";

        event(new SendOtpForLogin($mobile, $message));

        // return json format
    }

    public function register(){
        //validation
        //data store
        //otp store

        $mobile = 1231231231;
        $message = "Your OTP is for registration is 1234";
        
        event(new SendOtpForRegistration($mobile, $message));

        // return json format
    }

    public function forgotPassword(){
        //validation
        //data store
        //otp store

        $mobile = 1231231231;
        $message = "Your OTP to forget password is 1234";
        
        event(new SendOtpToForgotPassword($mobile, $message));

        // return json format
    }
}
