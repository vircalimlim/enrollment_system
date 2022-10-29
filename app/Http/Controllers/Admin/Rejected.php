<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;


class Rejected extends Controller
{
    public function __invoke()
    {
          if(Gate::denies('logged-in')){

            dd('no access allowed');
          }
          if(Gate::allows('is-admin')){

    return view('admin.users.rejected',['users'=> User::whereHas('roles', function($query) {
      $query->whereNotNull('email_verified_at')->whereIn('name', ['declined', 'Declined']);

      })->orderBy('id')->paginate(10)]);

          }

          dd('you need to be an admin');
    }

}
