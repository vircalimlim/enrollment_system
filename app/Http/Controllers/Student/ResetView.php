<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;


class ResetView extends Controller
{
    public function __invoke(Request $request)
    {

     $email = $request->email;

    return view('student/activate',['email' => $email]);
  }
  
}
