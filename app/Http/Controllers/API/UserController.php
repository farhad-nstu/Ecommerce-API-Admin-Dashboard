<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ForgotRequest;
use App\Http\Requests\ResetRequest;
use App\User;
use DB;
use App\Mail\ForgotMail;
use Mail;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function get_authenticate_user()
    {
        return Auth::user();
    }

    public function forgot_password(ForgotRequest $request)
    {
    	$email = $request->email;
    	if(User::where('email', $email)->doesntExist()){
    		return response([
    			'message' => 'Email not found'
    		]);
    	}	
    	$token = rand(10, 10000);
    	try {
    		DB::table('password_resets')->insert([
    		'email' => $email,
    		'token' => $token
	    	]);

	    	Mail::to($email)->send(new ForgotMail($token));
	    	return response([
				'message' => 'Reset password mail send on your email'
			], 200);
    	} catch (Exception $e) {
    		return response([
				'message' => $e->getMessage()
			], 400);
    	}
    	
    }

    public function reset_password(ResetRequest $request)
    {
        $email = $request->email;
        $token = $request->token;
        $password = Hash::make($request->password);

        $checkEmail = DB::table('password_resets')->where('email', $email)->first();
        $checkToken = DB::table('password_resets')->where('token', $token)->first();

        if(!$checkEmail){
            return response([
                'message' => 'Email not found'
            ]);
        }

        if(!$checkToken){
            return response([
                'message' => 'Token not found'
            ]);
        }

        DB::table('users')->where('email', $email)->update([
            'password' => $password
        ]);
        DB::table('password_resets')->where('email', $email)->delete();

        return response([
            'message' => 'Password changes successfully'
        ], 200);
    }
}
