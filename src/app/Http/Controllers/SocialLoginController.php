<?php

namespace App\Http\Controllers;

use Exception;
use Laravel\Socialite\Facades\Socialite;

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
            $platformId = $platform+"_id";
            $socialLoginService = new SocialLoginService($platform, $platformId);
            $result = $socialLoginService->redirectTo();

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
