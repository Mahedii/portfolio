<?php

namespace App\Http\Controllers\Auth;

use Hash;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('LaravelAuthApp')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return redirect()->intended('/admin-dashboard')->withSuccess('Signed in');
            return response()->json(['token' => $token], 200);
        } else {
            return redirect()->back()->with('crudMsg', 'Login details are not valid');
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('Backend.pages.dashboard.index');
        }
        return redirect()->route("user.signin")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route("loginPage");
    }
}
