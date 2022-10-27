<?php

namespace App\Http\Controllers\User;

use App\Notifications\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Notification;

class Resend extends Controller
{
    public function __invoke(Request $request)
    {
    $email = $request->email;

    $user = User::where('email', $email)->first();


      if(!$user){

            $request->session()->flash('error','Email does not exist in our database');
            return view('user.verify');
        }


       if(is_null($user->email_verified_at)){

      $url = URL::signedRoute('user.verifyconfirm' , ['email'=> $user->email]);
        $verification =[

            'body'=> "You're almost done! Please verify that this is your email. Once you verify that this is your email, your enrolment form will be reviewed by an admin. Please wait for your acceptance email or an update request if your enrolment form is rejected",
            'message'=> 'Verify Email',
            'url'=> $url,
            'thankyou'=> 'Thank you for your cooperation.'

        ];


        Notification::send($user, new EmailVerification($verification));

        $request->session()->flash('success','An email verifcation has been sent');

        return view ('user.verify',['email' =>  $email]);
        }

          if(!$user){

            $request->session()->flash('error','Email does not exist in our database');
            return view('user.verify');
        }



    }
 
}
