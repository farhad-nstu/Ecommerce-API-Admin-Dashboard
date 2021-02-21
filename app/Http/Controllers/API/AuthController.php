<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Auth;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
    	try {
    		if(Auth::attempt($request->only('email', 'password'))){
	    		$user = Auth::user();

	    		$token = $user->createToken('app')->accessToken;

	    		return response([
	    			'message' => "successfully login",
	    			'token' => $token,
	    			'user' => $user
	    		], 200);    		
	    	}
    	} catch (Exception $e) {
    		return response([
				'message' => $e->getMessage()
			], 400);
    	}

    	return response([
			'message' => "invalid email or password",
		], 401);
    }

    public function register(RegisterRequest $request)
    {
    	try {
    		$user = User::create([
    			'role' => 'user',
	    		'name' => $request->name,
	    		'email' => $request->email,
	    		'password' => Hash::make($request->password)
	    	], 200);

	    	$token = $user->createToken('app')->accessToken;
			return response([
				'message' => "successfully registered",
				'token' => $token,
				'user' => $user
			], 200);
    	} catch (Exception $e) {
    		return response([
				'message' => $e->getMessage()
			], 401);
    	}
    	
    }
}
