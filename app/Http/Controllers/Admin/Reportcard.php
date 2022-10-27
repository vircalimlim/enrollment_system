<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class Reportcard extends Controller
{
    public function __invoke($id)
    {

       $user = User::findOrFail($id);

    return view('admin.users.reportcard',['user' => $user]);
    }

}
