<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }


    public function callback()
    {
        try {

            $googleUser = Socialite::driver('google')->stateless()->user();
            $user = User::where('email', $googleUser->email)->first();

            if ($user) {
                Auth::loginUsingId($user->id);
            }   else {
                $newUser = User::create([
                    'username'  =>  $googleUser->given_name . $googleUser->family_name,
                    'email'     =>  $googleUser->email,
                    'password'  =>  Str::random(10),
                ]);

                Auth::loginUsingId($newUser->id);
            }
            return to_route('admin.dashboard.index')->with('toast-success', 'خوش آمدید!');

        } catch (\Exception $e) {
            return to_route('login');
        }
    }
}
