<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LinkedinController extends Controller
{
    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function handleLinkedinCallback()
    {
        try {
            $user = Socialite::driver('linkedin')->user();
            $socialUser = User::where('linkedin_id', $user->id)->first();
            
            if ($socialUser) {
                Auth::login($socialUser);
            } else {
                $newUser = (new UserService())->createSocialUser($user, 'linkedin_id');
                Auth::login($newUser);
            }
            return redirect()->intended('dashboard');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
