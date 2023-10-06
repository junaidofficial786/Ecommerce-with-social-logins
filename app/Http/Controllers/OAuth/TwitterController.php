<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Services\SocialAuthHandler;
use Laravel\Socialite\Facades\Socialite;

class TwitterController extends Controller
{
    protected string $driver = 'twitter';

    protected string $dbSocialColumn = 'twitter_id';

    public function __construct(public SocialAuthHandler $socialAuthHandler)
    {

    }

    public function redirectToTwitter()
    {
        return Socialite::driver($this->driver)->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleTwitterCallback()
    {
        $response = $this->socialAuthHandler->handleOAuthCallbacks($this->driver, $this->dbSocialColumn);

        return $this->conditionalRedirectOrBack($response, true, 'dashboard');
    }
}
