<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class AuthService extends Controller
{
    public function authenticateAdmin($request)
    {
        try {
            $user = User::query()
                ->where('email', $request->email)
                ->whereType(1) //type 1 for admin, 0 for normal user
                ->first();

            if (!$user) {
                $this->setMessage('Account not found');
                return $this->response();
            }

            $data = [ 'email' => $request->email, 'password' => $request->password];

            $remember = (bool) $request->input('remember');

            if (Auth::attempt($data)) {
                Auth::login($user, $remember); 
                $this->setStatus(true);
                $this->setMessage('Logged in successfully');
            } else {
                $this->setStatus(false);
                $this->setMessage('Invalid credentials');
            }
        } catch (Exception $e) {
            $this->setStatus(false);
            $this->setMessage('Something went wrong');
        }

        return $this->response();
    }
}
