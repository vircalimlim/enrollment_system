<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ListGenerator extends Controller
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

    if( $request['list'] == 1){

 $users = User::whereHas('roles', function($query) {

      $query->whereNotNull('indigency')->where('name', 'accepted');

      })->orderBy('id')->paginate(10);


 $users->appends(['list' => '1']);

    return view ('admin.generatelist',['users'=> $users]);

    }
    
    if( $request['list'] == 2){

     $users = User::whereHas('roles', function($query) {

      $query->whereNotNull('psanumber')->where('name', 'accepted');

      })->orderBy('id')->paginate(10);


      $users->appends(['list' => '2']);

    return view ('admin.generatelist',['users'=> $users]);

    }

    if( $request['list'] == 3){

     $users = User::whereHas('roles', function($query) {

      $query->where('studenttype','Transferee')->where('name', 'accepted');

      })->orderBy('id')->paginate(10);


    $users->appends(['list' => '3']);

    return view ('admin.generatelist',['users'=> $users]);

    }

    if( $request['list'] == 4){

      $users = User::whereHas('roles', function($query) {

      $query->where('studenttype','Balik Aral/Returning Student')->where('name', 'accepted');

      })->orderBy('id')->paginate(10);


    $users->appends(['list' => '4']);

    return view ('admin.generatelist',['users'=> $users]);

    }

    }
}
