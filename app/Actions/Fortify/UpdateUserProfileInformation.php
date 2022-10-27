<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Facades\URL;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
//dd($input);
    $userrole = DB::table('role_user')->where('user_id', $input['id'])->first();

    $role = $userrole->role_id;

   if($role != '3'){

             dd('You have already updated your enrolment form please wait for the admin to respond to it');
    }

    
   
     $user = DB::table('users')->where('email', $input['email'])->first();

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

            DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'name' => $input['name'] ,
                    'middlename' => $input['middlename'] ,
                    'lastname' => $input['lastname'] ,
   
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
          'semester' => $input['semester'],
          'updated' => 'Yes',
    

            ]);

                 DB::table('role_user')
                ->where('id', $userrole->id)
                ->update([
                    'role_id' => '4'
                 ]);

     
    $user = User::where('email', $input['email'])->first();
        
      if (isset($input['modality'])) {
        $user->modalities()->sync($input['modality']);
        } 

        

}

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }


}
