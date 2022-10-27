<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class Contact extends Controller
{
    public function __invoke()
    {       

    return view('contact');
    }

}
