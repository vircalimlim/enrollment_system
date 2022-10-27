<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appeal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class AppealView extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

    //dd($request->all());

    $user = User::find($request->id);

   if(!$user){


      $request->session()->flash('error','User does not exist');
      return redirect(URL('index'));
    }

   if(DB::table('appeals')->where('user_id',$request->id)->exists()){

    $request->session()->flash('error','You have already submitted an appeal.Please wait for your appeal to be evaluated');
    return redirect(URL('index'));

   } 
  
  
      return view('user.appeals', ['user' => $user]);
    
    }
}
