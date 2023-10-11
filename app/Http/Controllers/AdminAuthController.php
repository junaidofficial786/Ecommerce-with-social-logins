<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function __construct(public AuthService $authService)
    {

    }

    public function index()
    {
        return view('admin.login.index');
    }

    public function authenticate(AuthenticateRequest $request)
    {
        $response = $this->authService->authenticateAdmin($request);

        return $this->conditionalRedirectOrBack($response, false, null, true, 'admin.dashboard');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        
        return redirect()->route('admin.login-view');
    }
}
