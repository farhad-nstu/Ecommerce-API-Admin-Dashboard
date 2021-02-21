<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Image;
use App;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        // return view('home');
        $setting = Setting::first();
        return view('dashboard.index',compact('setting')); 
    }

    public function showSettings(){
        $settings = Setting::first();
        // return $settings;
        return view('dashboard.settings.showsettings',compact('settings'));
    }
    public function settingsUpdate(Request $request){
        // return $request; 
        //For Key Value Fair
        // $sData['application_title'] = $request->application_title;
        // $sData['application_credit'] = $request->application_credit;
        // $sData['developer_url'] = $request->developer_url;
        // $sData['copyright_text'] = $request->copyright_text;
        // $sData['maintenance_words'] = $request->maintenance_words;
        // $sData['logo'] = $this->createLogo($request); 
        //$setting->settings_data =  json_encode($sData);
        //$setting->update(); 
        $setting = Setting::find($request->setting_id);
        $setting ->logo = $this->createLogo($request); 
        $setting->application_title = $request->application_title;
        $setting->application_credit = $request->application_credit;
        $setting->developer_url = $request->developer_url;
        $setting->copyright_text = $request->copyright_text;
        $setting->maintenance_words = $request->maintenance_words;
        $setting->update();
        return back();
    }  
    protected function createLogo($request){
        $file  =  $request->file('logo');
        $image = $file->getClientOriginalName();
        $path  = 'uploads/';
        $imageUrl = $path.$image;
        Image::make($file)->resize(200,200)->save($imageUrl);
        return $imageUrl;
    }

    //Change Language Method
    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang); 
        return redirect()->back();
    }

    //View Profile
    public function viewProfile(Request $request){  
        return view('dashboard.user.view-profile');
    }

    //Profile Update
    public function updateProfile(Request $request){ 
        $this->validate($request,[ 
            'name' => 'string', 
        ]); 
        $user_id = Auth::user()->id;  
        $user = User::find($user_id);
        $user->name = $request->name;
        $user->update();    

        $user = User::where('id',$user_id)->first(); 
        return view('dashboard.user.ajax-user-update',compact('user'));

    }

    //Change User Password
    public function passwordChangeView(){
        return view('dashboard.user.password-change-view');
    }

    public function passwordUpdate(Request $request){
        $this->validate($request,[
            'password' => ['required', 'string', 'min:8','confirmed'],
        ]);

        $oldPassword = $request->oldpass;
        $user_id = Auth::user()->id; 
        $user = User::find($user_id); 

        if (Hash::check($oldPassword, $user->password)) { 
            $user->password = Hash::make($request->newpass);
            $user->save();
            return redirect("/home/view-profile")->with('message','Password Change Succeesfull');
        }else{
            return back()->with('error','Password does not matched');
        }

    }
}
