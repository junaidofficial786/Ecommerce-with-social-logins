<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthHandler extends Controller
{
    /**
     * Receives social driver name and dedicated db column name, fetch information of user from social
     * account and stores inside database
     *
     * @param string $driver
     * @param string $dbSocialColumn
     * @return array
     */
    public function handleOAuthCallbacks(string $driver, string $dbSocialColumn): array
    {
        try {
            // Retrieve the user's information from social account using Socialite.
            $user = Socialite::driver($driver)->user();

            // Check if a user with the social ID already exists in your database.
            $socialUser = User::where($dbSocialColumn, $user->id)->first();

            if ($socialUser) {
                // If the user exists, log them in.
                Auth::login($socialUser);
            } else {
                // If the user does not exist, create a new user and log them in.
                $newUser = (new UserService())->createSocialUser($user, $dbSocialColumn);
                Auth::login($newUser);
            }

            $this->setStatus(true);
            $this->setMessage('Logged in successfully');
            //load dashboard page
        } catch (Exception $e) {
            // Handle any exceptions that may occur during the process.
            // You may want to log the error or display a user-friendly message.
            $this->setStatus(false);
            $this->setMessage($e->getMessage());
        }

        return $this->response();
    }
}
