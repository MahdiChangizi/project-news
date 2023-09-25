<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        // validation
        $inputs = $request->validate([
            'username' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', Password::min(6)->numbers()->symbols()->letters()],
        ]);

        // Register NewUser
        $inputs['password'] = Hash::make($request->password);
        $user = User::create($inputs);

        // LoginUser
        Auth::loginUsingId($user->id);

        return to_route('admin.dashboard.index')->with('toast-success', 'به حساب کاربری خود خوش آمدید!');

    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // validation
        $inputs = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && $user->email == $request->email && $user->password == Hash::check($request->password, $user->password)) {
            Auth::loginUsingId($user->id);
        }

        return to_route('admin.dashboard.index')->with('toast-success', 'شما با موفقیت وارد حساب خود شدید!');
    }

    public function logout()
    {
        Auth::logout();

        return to_route('auth.loginForm');
    }

    public function forgotForm()
    {
        return view('auth.forgot');
    }
}
