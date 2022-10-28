<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\Notifications\UpdateForm;
use App\Notifications\SurveyForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Collection;
use App\Notifications\EmailVerification;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  if(Gate::denies('logged-in')){

        //     return 'no access allowed';
        //     dd('no access allowed');
        //   }
          if(Gate::allows('is-admin')){

    return view('admin.users.index',['users'=> User::whereHas('roles', function($query) {
      $query->whereNotNull('email_verified_at')->where('name', 'pending');

      })->orderBy('id')->paginate(10)]);

          }

        //   return 'you need to be an admin';
        //   dd('you need to be an admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

          return view('admin.users.create',['roles'=>Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $user = User::create($request->only([
            
            'name',
            'middlename',
            'lastname',
            'phonenumber',
            'email',
            'password'   

        ]));

        $user->roles()->attach(1);

        Password::sendResetLink($request->only(['email']));

        $request->session()->flash('success','Succesfully created an admin account');

        return redirect(route('admin.management.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return view('admin.users.show',
        [
            'roles'=>Role::all(),
            'user' =>User::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    $user = User::find($id);

    if($user->gradeleveltoenrolin == 'Grade 12'){

        $gradeleveltoenrolin = 'Grade 11';

    }

    if($user->gradeleveltoenrolin == 'Grade 11'){

        $gradeleveltoenrolin = 'Grade 10';

    }

    if($user->gradeleveltoenrolin == 'Grade 10'){

        $gradeleveltoenrolin = 'Grade 9';

    }

    if($user->gradeleveltoenrolin == 'Grade 9'){

        $gradeleveltoenrolin = 'Grade 8';

    }

    if($user->gradeleveltoenrolin == 'Grade 8'){

        $gradeleveltoenrolin = 'Grade 7';

    }

    if($user->gradeleveltoenrolin == 'Grade 7'){

        $gradeleveltoenrolin = 'Grade 7';

    }

if(($gradeleveltoenrolin == 'Grade 11') || ($gradeleveltoenrolin == 'Grade 12') ){

     $section =  DB::table('sections')->where('grade',$gradeleveltoenrolin)->where('strand',$user->strandtoenrolin)->where('lower_gwa','<',$user->generalaverage)->where('upper_gwa','>',$user->generalaverage)->first();

    }

  else{

 $section =  DB::table('sections')->where('grade',$gradeleveltoenrolin)->where('lower_gwa','<',$user->generalaverage)->where('upper_gwa','>',$user->generalaverage)->first();

  }  

if(isset($section)) {
   $subject = DB::table('subjects_teachers_schedule')->where('section_id', $section->id)->get();
  $adviser =  DB::table('teachers')->where('advisory', $section->id)->first();   

      return view('admin.users.edit',
        [
            'roles'=>Role::all(),
            'user' => $user,
            'section' => $section,
            'subjects' => $subject,
            'adviser' => $adviser,

        ]);
}

else{
      return view('admin.users.edit',
        [
            'roles'=>Role::all(),
            'user' => $user,
            'warning' => 'warning',
        ]);

}
//dd($section);

  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//accept student
//dd($request->all());

 $user = User::find($id);

if($request['accepted_as'] == 'Conditionally Promoted'){

    if(isset($request['subjects'])){

        foreach($request['subjects'] as $index => $subject) {

      DB::table('conditionally_promoted_subjects')->insert([
     
        'subjects_teachers_schedule_id' => $request['subjects'][$index],
        'user_id' => $user->id,
      
         ]); 
      }

    }

    else
    {

$request->session()->flash('error','Please choose a subject for the student to take for his/her conditional promotion');

        return redirect(route('admin.users.index'));

    }



}

        $user->accepted_as = $request['accepted_as'];
        $user->save();



       
//dd('banana');
        $userrole = DB::table('role_user')->where('user_id', $id)->first();

        $role = $userrole->role_id;
 
        if(!$user){

            $request->session()->flash('error',"You can not accept this the student's enrolment application");
            return redirect(route('admin.users.index'));

        }

        $url = URL::signedRoute('student.resetview' , ['email'=> $user->email]);
        $surveydata =[

            'body'=> 'Congratulations! Your application have been accepted.',
            'message'=> 'Please click the link to set a password for your account',
            'url'=> $url,
            'thankyou'=> 'This link expires in 3 days.'

        ];

        
        Notification::send($user, new SurveyForm($surveydata));

        if($role = 4){

        $user->roles()->detach(4); 
        $user->roles()->attach(2);

        }

        if($role = 3){

        $user->roles()->detach(3); 
        $user->roles()->attach(4);

        }


        $request->session()->flash('success','The user has been sent an account activation request');

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
//decline student
    
        $user = User::findOrFail($id);

   

        $user->updated = 'No';
        $user->save();

         $userrole = DB::table('role_user')->where('user_id', $id)->first();

        $role = $userrole->role_id;


            $error = array();

            if (isset($request['reason1'])) {

               $reason1= $request->input('reason1');
              $error = array_add($error, 'reason1', $reason1);
               }

           if (isset($request['reason2'])) {

               $reason2= $request->input('reason2');
              $error = array_add($error, 'reason2', $reason2);    
               }

             if (isset($request['reason3'])) {

               $reason3= $request->input('reason3');
              $error = array_add($error, 'reason3', $reason3);
               }

           if (isset($request['reason4'])) {

               $reason4= $request->input('reason4');
              $error = array_add($error, 'reason4', $reason4);    
               }
                if (isset($request['reason5'])) {

               $reason5= $request->input('reason5');
              $error = array_add($error, 'reason5', $reason5);
               }

           if (isset($request['reason6'])) {

               $reason6= $request->input('reason6');
              $error = array_add($error, 'reason6', $reason6);    
               }

                if (isset($request['reason7'])) {

               $reason7= $request->input('reason7');
              $error = array_add($error, 'reason7', $reason7);    
               }

               $specification= $request->input('specification');

               $error = implode(',', $error);

        if (  (empty($error))    &&    (empty($specification))  ) {
             $request->session()->flash('error',"Please choose at least one reason for the application's rejection or specify the reason in the message box");
         return redirect(route('admin.reason',['id' => $id]));
         }


         if(!$user){

            $request->session()->flash('error','You can not delete this the user');
            return redirect(route('admin.users.index'));

        }


        if($role = 4){

        $user->roles()->detach(4); 
        $user->roles()->attach(3);
        }

        if($role = 2){

        $user->roles()->detach(2); 
        $user->roles()->attach(3);
        }







       
      $url = URL::signedRoute('user.profile' , ['id'=> $id]);  

            $updatedata =[

            'body'=> 'Your enrolment application  has been denied. Below are the reasons for its rejection:',
             'specification'=> $specification,
            'error'=> $error,
            'message'=> "You have been permitted to update your form.Please click this link to view the form.Please contact us for any questions regaring your application's rejection",
            'url'=> $url,
          'thankyou'=> 'Thank you for your patience'

        ];


      if(!isset($request['attach'])){


          $url =  URL::signedRoute('user.appeals' , ['id'=> $id]);

         $updatedata =[

            'body'=> 'Your enrolment application  has been denied. Below are the reasons for its rejection:',
             'specification'=> $specification,
            'error'=> $error,
            'message'=> "You have not been permitted to update your form. You may appeal through the link attached to this email.",
            'url'=> $url,
          'thankyou'=> 'Thank you for your patience'

        ];


     }
  



        Notification::send($user, new UpdateForm($updatedata));


       

        $request->session()->flash('success',"A request to update the student's enrolment form has been sent");
        return redirect(route('admin.users.index'));

    }

}
