<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Http\Resources\UserResource;

use Laravel\Socialite\Facades\Socialite;
use Session;
session_start();
class ControllerLogin extends Controller
    {
    public function login()
    {

        return view('user.testLogin');
    }
    public function postlogin(Request $request)
    {
        $this->validate($request, [

        'email' => 'required', 'email',
        'password' => 'required',
        ], [

        'email.required' => 'Vui lòng nhập email của bạn',
        'email.required' => 'Email không đúng định dạng',
        'password.required' => 'Password không được để trống',
        ]);

        if (Auth::guard('customer')->attempt($request->only( 'email', 'password'), $request->has('remember'))) {
        return redirect()->route('home');
        } else {
        return redirect()->back();
        }
    }

    public function signup_user()
    {
        return view('user.testReg.register');
    }
    public function post_signup_user()
    {

        return view('user.testReg.register');
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        session(['cart' => []]);
        return redirect()->route('home');
    }
    public function login_google(){
        return Socialite::driver('google')->redirect();

    }
    public function callback_google(){
        try{
            $provider = Socialite::driver('google')->stateless()->user();
            $saveUser = User::updateOrCreate([
                'provider_id' => $provider->getId(),
                'provider' => 'google',
            ],
            [
                'name' => $provider->getName(),
                'email' => $provider->getEmail(),
                'password' => '',
                'avatar' => $provider->getAvatar(),
            ]);
            Auth::login($saveUser, true);
            Auth::guard('customer')->login($saveUser);
            return redirect()->route('home');
            }catch (\Throwable $th) {
                    throw $th;
            }
            // return redirect()->route('sp');
    }
    //   login facebook
    public function login_facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callback_facebook()
    {
        try{
            $provider = Socialite::driver('facebook')->stateless()->user();
            $saveUser = User::updateOrCreate([
                'provider_id' => $provider->getId(),
                'provider' => 'facebook',
            ],
            [
                'name' => $provider->getName(),
                'email' => $provider->getEmail(),
                'password' => '',
                'avatar' => $provider->getAvatar(),
            ]);
            Auth::login($saveUser, true);
            Auth::guard('customer')->login($saveUser);
            return redirect()->route('home');
            }catch (\Throwable $th) {
                    throw $th;
            }
    }

}
