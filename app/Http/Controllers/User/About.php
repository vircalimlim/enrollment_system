<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class About extends Controller
{
    public function __invoke()
    {       

    return view('about');
    }

}
