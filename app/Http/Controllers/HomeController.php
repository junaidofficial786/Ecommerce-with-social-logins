<?php

namespace App\Http\Controllers;

use App\Services\HomeService;

class HomeController extends Controller
{
    public function __construct(public HomeService $homeService)
    {
    }

    public function index()
    {
        $response = $this->homeService->index();

        return $this->conditionalRedirectOrBack($response, true, 'pages.home');
    }
}
