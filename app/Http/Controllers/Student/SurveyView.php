<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;


class SurveyView extends Controller
{
    public function __invoke(Request $request)
    {
  $id = $request->id;
     $user = User::where('id',$id)->first();
 $check = 'Yes';

     if( $check == 'Yes'  ){

    return view('student.survey',['user' => $user]);

      }

  $request->session()->flash('success','You are now officially enrolled. Log-in to check your student account');
   return redirect(route('login'));
  }
}
