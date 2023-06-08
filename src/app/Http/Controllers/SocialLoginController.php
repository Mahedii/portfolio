<?php

namespace App\Http\Controllers;

use Exception;
use Laravel\Socialite\Facades\Socialite;
use App\Services\SocialLogin\SocialLoginService;

class SocialLoginController extends Controller
{
    /**
     * Redirect to: platform
     *
     */
    public function redirectTo($platform)
    {
        return Socialite::driver($platform)->redirect();
    }

    /**
     * Handle Callback
     *
     */
    public function handleCallback($platform)
    {
        try {
            $platformId = $platform . "_id";
            $socialLoginService = new SocialLoginService($platform, $platformId);
            $result = $socialLoginService->redirectTo();

            if ($result["status"] == 200) {
                return redirect()->intended('/dashboard')->withSuccess('Signed in');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
