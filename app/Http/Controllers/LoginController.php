<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(Request $request) {

        $user_data = Auth::user();
        // dd($user_data);
        return view('layouts.pages.auth.login', [
            'user_data' => $user_data
        ]);
    }

    public function login(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if(isset($user)) {

            if (password_verify($request->password, $user->password)) {

                $request->session()->regenerate();
                Auth::login($user);
                return redirect()->route('home');
            } else {
                return redirect()->back()->with('error', 'Wrong Password');
            }
        } else {
            return redirect()->back()->with('error', 'Credential Wrong');
        }

    }

    public function showSignUpForm(Request $request) {
        return view('layouts.pages.auth.sign-up');
    }

    public function register(Request $request) {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'picture' => 'nullable',
        ]);

        $image_name = '-';
        $image_url = '-';

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if(isset($request->picture)) {
            $image_name = time(). '.' . $request->picture->extension();
            $image_url = $request->picture->move(public_path('profile'), $image_name);

        }

        $user->picture = $image_url;
        $user->save();

        return redirect()->route('auth.login.show')->with('success', 'Register successfully');


    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login.show');
    }
}
