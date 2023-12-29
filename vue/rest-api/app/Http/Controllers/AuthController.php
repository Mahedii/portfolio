<?php

namespace App\Http\Controllers;

use Hash;
use Session;
// use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
// use Illuminate\Support\Facades\Validator;
// use Stevebauman\Location\Facades\Location;
// use App\Models\Page\VisitorInfo\VisitorInfo;

class AuthController extends Controller
{
    public function signInPage(Request $request)
    {
        $ip = $request->ip();
        // $currentUserInfo = Location::get($ip);

        // $visitorInfoInsert = VisitorInfo::create([
        //     'ip' => $ip,
        //     'countryName' => $currentUserInfo->countryName,
        //     'countryCode' => $currentUserInfo->countryCode,
        //     'regionName' => $currentUserInfo->regionName,
        //     'regionCode' => $currentUserInfo->regionCode,
        //     'cityName' => $currentUserInfo->cityName,
        //     'zipCode' => $currentUserInfo->zipCode,
        //     'isoCode' => $currentUserInfo->isoCode,
        //     'postalCode' => $currentUserInfo->postalCode,
        //     'latitude' => $currentUserInfo->latitude,
        //     'longitude' => $currentUserInfo->longitude,
        //     'metroCode' => $currentUserInfo->metroCode,
        //     'areaCode' => $currentUserInfo->areaCode
        // ]);

        if (Auth::check()) {
            return view('/admin.dashboard');
        } else {
            return view('admin.auth.signin');
        }
    }

    public function userSignin(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Please Enter Your Email',
            'password.required' => 'Please Enter Your password',
        ]);

        $credentials = $request->only('email', 'password');
        // $token = auth()->attempt($credentials);

        // if (!$token) {
        //     return response()->json([
        //         'message' => 'Unauthorized',
        //     ], 401);
        // }

        try {
            if (Auth::attempt($credentials)) {
                // $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
                // $user = Auth::user();
                // $token = JWTAuth::fromUser($user);
                $token = JWTAuth::attempt($credentials);
                Log::debug($token);

                return $this->createNewToken($token);
            }
            return response()->json(['success' => false, 'message' => 'Login details are not valid'], 401);
        } catch (JWTException $e) {
            return response()->json(['success' => false, 'message' => 'Could not create token'], 500);
        }
    }

    public function userDetails()
    {
        return response()->json([
            'success' => true,
            'user' => Auth::user()
        ]);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL(), // get the token expiration time from config/jwt.php
            'user' => auth()->user()
        ]);
    }

    public function signUpPage()
    {
        return view('admin.auth.signup');
    }

    public function userSignup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8|max:12',
        ], [
            'name.required' => 'Please Enter Your Name',
            'email.required' => 'Please Enter Your Email',
            'password.required' => 'Please Enter Your password',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect()->route("dashboard")->withSuccess('Successfully registered');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function dashboard()
    {
        if (Auth::check()) {
            return view('/admin.dashboard');
        }

        return redirect()->route("signin-page")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return response()->json([
            'success' => true,
        ]);
    }
}
