<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('frontend.auth.login');
    }

    public function register()
    {
        return view('frontend.auth.register');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', "Tizimga muvaffaqiyatli kiritildingiz!");
        }

        return back()->withErrors([
            'email' => 'Taqdim etilgan hisob ma\'lumotlari bizning yozuvlarimizga mos kelmaydi.',
        ])->onlyInput('email');
    }

    public function register_store(StoreUserRequest $request)
    {

        $request['password'] = Hash::make($request['password']);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ]);

        Auth::login($user);

        return redirect('/')->with('success', "Tizimga muvaffaqiyatli qo'shildingiz!");
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    } 

}
