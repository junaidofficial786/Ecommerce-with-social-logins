<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class TwitterController extends Controller
{
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleTwitterCallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
            $socialUser = User::where('twitter_id', $user->id)->first();
            if($socialUser){
                Auth::login($socialUser);
                return redirect()->intended('dashboard');
            }else{
                $newUser = (new UserService())->createSocialUser($user, 'twitter_id');
                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
