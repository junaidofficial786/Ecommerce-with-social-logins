<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Services\SocialAuthHandler;
use Laravel\Socialite\Facades\Socialite;

class LinkedinController extends Controller
{
    protected string $driver = 'linkedin';

    protected string $dbSocialColumn = 'linkedin_id';

    public function __construct(public SocialAuthHandler $socialAuthHandler)
    {

    }

    public function redirectToLinkedin()
    {
        return Socialite::driver($this->driver)->redirect();
    }

    public function handleLinkedinCallback()
    {
        $response = $this->socialAuthHandler->handleOAuthCallbacks($this->driver, $this->dbSocialColumn);

        return $this->conditionalRedirectOrBack($response, true, 'dashboard');
    }
}
