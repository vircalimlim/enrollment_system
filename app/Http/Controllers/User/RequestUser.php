<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UpdateForm;
use App\Notifications\SurveyForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Password;

class RequestUser extends Controller
{
    public function __invoke(Request $request)
    {
    
     $user = User::where('email',$request['email'])->first();

         if(!$user){

            $request->session()->flash('error','Credentials do not match our records');
            return redirect(route('password.request'));

        }

      $userrole = DB::table('role_user')->where('user_id', $user->id)->first();

      $role = $userrole->role_id;

      



    if($role == '1'){

         Password::sendResetLink($request->only(['email']));

    $request->session()->flash('success','You may reset your password thru the email we sent.Please check your email');

    return redirect(route('password.request'));

    }


    if($role == '2'){

   $url = URL::signedRoute('student.surveyview' , ['id'=> $user->id]);
        $surveydata =[

            'body'=> 'Congratulations! Your application have been accepted.',
            'message'=> 'Answer survey',
            'url'=> $url,
            'thankyou'=> 'This link expires in 3 days.'

        ];

        
        Notification::send($user, new SurveyForm($surveydata));

    $request->session()->flash('success','Your application has been accepted please check your email for further instructions');

    return redirect(route('password.request'));
    }


    if($role == '3'){



        $url = URL::signedRoute('user.profile' , ['id'=> $user->id]);
        $updatedata =[

            'body'=> 'Your enrolment application  has been denied. Below are the reasons for its rejection:',
             'specification'=> 'Please review your enrolment form',
            'error'=> 'Check your requirements properly',
            'message'=> 'You are allowed to update your form',
            'url'=> $url,
            'thankyou'=> 'You have 3 days to update your form'

        ];

    $user->updated = 'No';
    $user->save();

        
        Notification::send($user, new UpdateForm($updatedata));

    $request->session()->flash('success','You may update your form thru the email we sent.');

    return redirect(route('password.request'));

    }

    $request->session()->flash('warning','Your application is still pending please be patient');

   
    return redirect(route('password.request'));

    }

}
