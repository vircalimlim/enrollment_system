<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterView extends Controller
{
   public function __invoke(Request $request)
    {
//dd($request->all());
      return view('auth.register',['email' => $request['email'],'lrnnumber' => $request['lrnnumber'] ]);

    }
}
