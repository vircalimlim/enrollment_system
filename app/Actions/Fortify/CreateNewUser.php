<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

use App\Notifications\EmailVerification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Notification;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
//dd($input['modality']);

    $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
    $password = substr($random, 0, 10);



        Validator::make($input, [
          
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)],

                  'lastgradelevelcompleted',
                  'strandtoenrolin',
                  'semester',
                  'studenttype' =>['required'],
                  'indegenouscommunity',
                  'indegency',
                  'name',
                  'middlename',
                  'lastname',
                  'currenthousenumber',
                  'currentbaranggay',
                  'currentmunicipality',
                  'currentprovince',
                  'permanenthousenumber',
                  'permanentbaranggay' ,
                  'permanentmunicipality',
                  'permanentprovince', 
                  'email', 
                  'phonenumber', 
                  'birthday', 
                  'age' ,
                  'sex' => ['required'],
                  'mothertongue',
                  'religion', 
                  'generalaverage' ,
                  'lrnnumber' ,
                  'psastatus'=> ['required'] ,
                  'psanumber' ,
                  'fatherfirstname' ,
                  'fathermiddlename' ,
                  'fatherlastname' ,
                  'fatherphonenumber' ,
                  'motherfirstname' ,
                  'mothermiddlename' ,
                  'motherlastname' ,
                  'motherphonenumber',
                  'guardianfirstname' ,
                  'guardianmiddlename' ,
                  'guardianlastname' ,
                  'guardianphonenumber' ,
                  'gradeleveltoenrolin' ,
                  'lastschoolyearattended' ,
                  'lastschoolattended' ,
                  'schoolid',
                  'chooseFile', 
                  'chooseFile2'

           /*
          'lastschoolyearattended' => ['required', 'string', 'max:255'],
          'lastschoolattended'=> ['required', 'string', 'max:255'],
          'addressofthelastschoolattended'=> ['required', 'string', 'max:255'],
          'lastgradelevelcompleted'=> ['required'],
          'laststrandattended'=>['required'],
          'schooltype'=> ['required'],
          'gradeleveltoenrolin'=> ['required'],
          'strandtoenrolin'=> ['required', 'string', 'max:255'],
          'returningstudent'=> ['required'],
          'housenumber'=> ['required', 'string', 'max:255'],
          'baranggay'=> ['required', 'string', 'max:255'],
          'municipality'=> ['required', 'string', 'max:255'],
          'province'=> ['required', 'string', 'max:255'],
          'phonenumber'=> ['required', 'max:11'],
          'birthday'=> ['required'],
          'age'=>['required'],
          'sex'=> ['required'],
          'mothertongue'=> ['required', 'string', 'max:255'],
          'religion'=> ['required', 'string', 'max:255'],
          'generalaverage'=> ['required', 'string', 'max:2'],
          'lrnnumber'=> ['required','max:12'],
          'psastatus'=> ['required'],
          'psanumber'=>['max:10'],
          'fatherfirstName' => ['required', 'string', 'max:255'],
          'fathermiddleName'=> ['required', 'string', 'max:255'],
          'fatherlastName'=> ['required', 'string', 'max:255'],
          'motherfirstname'=> ['required', 'string', 'max:255'],
          'mothermiddlename'=> ['required', 'string', 'max:255'],
          'motherlastname'=> ['required', 'string', 'max:255'],
          'guardianfirstname'=> ['required', 'string', 'max:255'],
          'guardianmiddlename'=> ['required', 'string', 'max:255'],
          'guardianlastname'=> ['required', 'string', 'max:255'],
          'guardianrelationship'=> ['required', 'string', 'max:255'],
          'guardianphonenumber'=> ['required', 'max:11'],
          'guardianemail'=> ['email','string', 'max:255']
         */
            ])->validate();

      
      if (isset($input['permanentyes'])) {
          
          $input['permanentbaranggay'] = $input['currentbaranggay'];
          $input['permanenthousenumber'] = $input['currenthousenumber'];
          $input['permanentmunicipality'] = $input['currentmunicipality'];
          $input['permanentprovince'] = $input['currentprovince']; 

      }


      if ($input['gradeleveltoenrolin'] == 'Grade 7' ) {

          $input['semester'] = 'Not Applicable';
          $input['strandtoenrolin'] = 'Not Applicable';

           }
         
      if ($input['gradeleveltoenrolin'] == 'Grade 8' ) {

          $input['semester'] = 'Not Applicable';
          $input['strandtoenrolin'] = 'Not Applicable';

           }

      if ($input['gradeleveltoenrolin'] == 'Grade 9' ) {

              $input['semester'] = 'Not Applicable';
              $input['strandtoenrolin'] = 'Not Applicable';

               }
             
      if ($input['gradeleveltoenrolin'] == 'Grade 10' ) {

              $input['semester'] = 'Not Applicable';
              $input['strandtoenrolin'] = 'Not Applicable';
              
               }

      if ( $input['studenttype'] == 'Old Student' ) {

          $input['lastgradelevelcompleted'] = 'Not Applicable';
          $input['lastschoolyearattended'] = 'Not Applicable';
          $input['lastschoolattended'] = 'Not Applicable';
          $input['schoolid'] = 'Not Applicable';
      
           }



       $file =  $input['chooseFile'];
                $file_extension = $file->getClientOriginalName();
                $destination_path = public_path() . '/requirements';
                $filename = $file_extension;
                $input['chooseFile']->move($destination_path, $filename);
                $input['chooseFile'] = $filename;
                $birthcertificate = $input['chooseFile']; 

        $file2 =  $input['chooseFile2'];
                $file_extension = $file2->getClientOriginalName();
                $destination_path = public_path() . '/requirements';
                $filename = $file_extension;
                $input['chooseFile2']->move($destination_path, $filename);
                $input['chooseFile2'] = $filename;
                $reportcard = $input['chooseFile2']; 


        $user = User::create([
         
            'email' => $input['email'],
            'password' => Hash::make($password),
            'name' => $input['name'],
            'middlename' => $input['middlename'],
            'lastname' => $input['lastname'],

          'lastgradelevelcompleted' => $input['lastgradelevelcompleted'] ,
          'strandtoenrolin' => $input['strandtoenrolin'],
          'semester'=> $input['semester'],
          'studenttype'=> $input['studenttype'],
          'indegenouscommunity' => $input['indegenouscommunity'],
          'indigency'=> $input['indigency'],
          'currenthousenumber' => $input['currenthousenumber'],
          'currentbaranggay' => $input['currentbaranggay'],
          'currentmunicipality' => $input['currentmunicipality'],
          'currentprovince' => $input['currentprovince'],
          'permanenthousenumber'=> $input['permanenthousenumber'],
          'permanentbaranggay' => $input['permanentbaranggay'],
          'permanentmunicipality'=>$input['permanentmunicipality'],
          'permanentprovince'=>$input['permanentprovince'],
          'phonenumber'=>$input['phonenumber'],
          'birthday'=>$input['birthday'], 
          'age'=>$input['age'],
          'sex' =>$input['sex'],
          'mothertongue'=>$input['mothertongue'],
          'religion'=>$input['religion'], 
          'generalaverage' =>$input['generalaverage'],
          'lrnnumber' =>$input['lrnnumber'],
          'psastatus' =>$input['psastatus'],
          'psanumber' =>$input['psanumber'],
          'fatherfirstname' =>$input['fatherfirstname'],
          'fathermiddlename' =>$input['fathermiddlename'],
          'fatherlastname' =>$input['fatherlastname'],
          'fatherphonenumber' =>$input['fatherphonenumber'],
          'motherfirstname' =>$input['motherfirstname'],
          'mothermiddlename' =>$input['mothermiddlename'],
          'motherlastname' =>$input['motherlastname'],
          'motherphonenumber'=>$input['motherphonenumber'],
          'guardianfirstname' =>$input['guardianfirstname'],
          'guardianmiddlename'=>$input['guardianmiddlename'],
          'guardianlastname' =>$input['guardianlastname'],
          'guardianphonenumber'=>$input['guardianphonenumber'],
          'gradeleveltoenrolin' =>$input['gradeleveltoenrolin'],
          'lastschoolyearattended' =>$input['lastschoolyearattended'],
          'lastschoolattended' =>$input['lastschoolattended'],
          'schoolid'=>$input['schoolid'],
          'birthcertificate' => $birthcertificate,
          'reportcard' => $reportcard,
          'updated' => 'No',
         'semester' => $input['semester']
        ]);



        $user->roles()->attach(4);


       if (isset($input['modality'])) {
        $user->modalities()->attach($input['modality']);
        } 
         $email =  $input['email'];


      $url = URL::signedRoute('user.verifyconfirm' , ['email'=> $email]);
        $verification =[

            'body'=> 'You are almost done! Please verify that this is your email. Once you verify that this is your email, your enrolment form will be reviewed by an admin. Please wait for your acceptance email or an update request if your enrolment form is rejected',
            'message'=> 'Verify Email',
            'url'=> $url,
            'thankyou'=> 'Thank you for your cooperation.'

        ];


    Notification::send($user, new EmailVerification($verification));
            
        session()->flash('success','Please check your email for verification');
        return $user;
    }
}
