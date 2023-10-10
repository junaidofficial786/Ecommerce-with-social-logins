<?php

namespace App\Services;

use App\Http\Controllers\Controller;

class HomeService extends Controller
{
    public function index (): array
    {
        $this->setStatus(true);
        $this->setMessage('Welcome !');

        return $this->response();
    }
}
