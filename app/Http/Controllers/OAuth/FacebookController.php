<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Services\SocialAuthHandler;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    protected string $driver = 'facebook';

    protected string $dbSocialColumn = 'facebook_id';

    public function __construct(public SocialAuthHandler $socialAuthHandler)
    {

    }

    /**
     * Redirect the user to Facebook for authentication.
     */
    public function redirectToFacebook(): RedirectResponse
    {
        return Socialite::driver($this->driver)->redirect();
    }

    /**
     * Handle the callback from Facebook after authentication.
     */
    public function handleFacebookCallback(): RedirectResponse
    {
        $response = $this->socialAuthHandler->handleOAuthCallbacks($this->driver, $this->dbSocialColumn);

        return $this->conditionalRedirectOrBack($response, true, 'dashboard');
    }
}
