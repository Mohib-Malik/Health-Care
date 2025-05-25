<?php

namespace App\Actions\Jetstream;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class CustomLoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        // Check the role of the authenticated user
        if (auth()->user()->usertype == 'admin') {
            return redirect()->intended('/index2'); // Redirect admin users to /index2
        }

        return redirect()->intended('/dashboard'); // Redirect other users to /dashboard
    }
}
