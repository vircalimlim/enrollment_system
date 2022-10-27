<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
class DisabledAdmin extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
            if(Gate::denies('logged-in')){

            dd('no access allowed');
          }
          if(Gate::allows('is-admin')){

    return view('admin.admin_management.disabled',['users'=> 
      User::whereHas('roles', function($query) {
      $query->where('name', 'disabled');

      })->orderBy('id')->paginate(10)]);

          }

          dd('you need to be an admin');
    }
}
