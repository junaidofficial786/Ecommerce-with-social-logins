<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Services\SocialAuthHandler;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    protected string $driver = 'google';

    protected string $dbSocialColumn = 'google_id';

    public function __construct(public SocialAuthHandler $socialAuthHandler)
    {

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver($this->driver)->redirect();
    }

    public function handleGoogleCallback()
    {
        $response = $this->socialAuthHandler->handleOAuthCallbacks($this->driver, $this->dbSocialColumn);

        return $this->conditionalRedirectOrBack($response, true, 'dashboard');
    }
}
