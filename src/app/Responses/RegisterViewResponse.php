<?php

namespace App\Responses;

use Laravel\Fortify\Contracts\RegisterViewResponse;

class CustomRegisterViewResponse implements RegisterViewResponse
{
    public function toResponse($request)
    {
        return view('auth.register');
    }
}
