<?php

namespace App\Http\Controllers; 
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Http\Request;
class UserRegistrationController extends Controller
{

    //Show Registration Form 
    public function showRegistrationForm(){ 
        if(Auth::user()->role=='superadmin'){
            return view('dashboard.user.registration-form');
        }else{
            return redirect('/home');
        }
    }

    public function userSave(Request $request){
        $this->validator($request->all())->validate(); 
        event(new Registered($user = $this->create($request->all()))); 
        return redirect('/home')->with('message','Registration Successfull');
    }
 
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'role' => $data['role'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    //Get All Users 
    public function userList(){ 
        $users = User::where([
            ['role', '!=', 'superAdmin'], 
        ])->get();
        $userCount = $users->count();
        return view('dashboard.user.user-list',compact('users','userCount'));
        
    }

    public function statusActive($userId){
        $user = User::find($userId);
        $user->status = 1;
        $user->update();
        return redirect('user-list')->with('message','User Activated');
    }

    public function statusDeactive($userId){
        $user = User::find($userId);
        $user->status = 0;
        $user->update();
        return redirect('user-list')->with('message','User Deactivated');
    }
}
