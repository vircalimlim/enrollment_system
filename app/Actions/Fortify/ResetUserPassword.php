<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\ResetsUserPasswords;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class ResetUserPassword implements ResetsUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and reset the user's forgotten password.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function reset($user, array $input)
    {
        $id = $user->id;

         $userrole = DB::table('role_user')->where('user_id', $id)->first();

            $role = $userrole->role_id;
  

            if( ($role  == '3')||($role == '4') ){

            dd('You are not eligible for a password reset');
            }


        Validator::make($input, [
            'password' => $this->passwordRules(),
        ])->validate();

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
     
    }

}
