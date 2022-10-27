<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class Birthcertificate extends Controller
{
    public function __invoke($id)
    {

       $user = User::findOrFail($id);

    return view('admin.users.birthcertificate',['user' => $user]);
    }

}
