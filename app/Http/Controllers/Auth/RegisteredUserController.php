<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;

class RegisteredUserController
    extends \Laravel\Fortify\Http\Controllers\RegisteredUserController
{

    public function store(Request $request, CreatesNewUsers $creator): RegisterResponse {
        event(new Registered($user = $creator->create($request->all())));

        $request->session()->flash('success','Please check your email for verification. If you have not received the email. You can go to the log-in page and request an email verification');
        return app(RegisterResponse::class);
    }


}