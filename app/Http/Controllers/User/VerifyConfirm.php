<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class VerifyConfirm extends Controller
{
  
         public function __invoke(Request $request)
    {
     

// dd($request->lrn);

    return view('auth.register',['email'=> $request->email, 'lrnnumber' => $request->lrn]);
    }

}
