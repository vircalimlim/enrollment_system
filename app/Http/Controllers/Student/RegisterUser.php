<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

use App\Notifications\EmailVerification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\StoreEnrolleeApplication;
use Carbon\Carbon;

class RegisterUser extends Controller
{
     public function __invoke(Request $request)
    {


          $this->validate($request, [
            'email'=> 'required|max:255|unique:users',
            'studenttype' => 'required',
            'sex' => 'required',
            'psastatus'=> 'required',
            'chooseFile' => 'required|image',
            'chooseFile2' => 'required|image']);

        //  dd($request->all());
    $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
    $password = substr($random, 0, 10);

   $date = Carbon::now();

      if (isset($request['permanentyes'])) {
          
          $request['permanentbaranggay'] = $request['currentbaranggay'];
          $request['permanenthousenumber'] = $request['currenthousenumber'];
          $request['permanentmunicipality'] = $request['currentmunicipality'];
          $request['permanentprovince'] = $request['currentprovince']; 

      }


      if ($request['gradeleveltoenrolin'] == 'Grade 7' ) {

          $request['semester'] = 'Not Applicable';
          $request['strandtoenrolin'] = 'Not Applicable';

           }
         
      if ($request['gradeleveltoenrolin'] == 'Grade 8' ) {

          $request['semester'] = 'Not Applicable';
          $request['strandtoenrolin'] = 'Not Applicable';

           }

      if ($request['gradeleveltoenrolin'] == 'Grade 9' ) {

              $request['semester'] = 'Not Applicable';
              $request['strandtoenrolin'] = 'Not Applicable';

               }
             
      if ($request['gradeleveltoenrolin'] == 'Grade 10' ) {

              $request['semester'] = 'Not Applicable';
              $request['strandtoenrolin'] = 'Not Applicable';
              
               }

      if ( $request['studenttype'] == 'Old Student' ) {

          $request['lastgradelevelcompleted'] = 'Not Applicable';
          $request['lastschoolyearattended'] = 'Not Applicable';
          $request['lastschoolattended'] = 'Not Applicable';
          $request['schoolid'] = 'Not Applicable';
      
           }


      $file =  $request['chooseFile'];
                $file_extension = $file->getClientOriginalName();
                $destination_path = public_path() . '/requirements';
                $filename = $file_extension;
                $request['chooseFile']->move($destination_path, $filename);
                $request['chooseFile'] = $filename;
                $birthcertificate = $request['chooseFile']; 

        $file2 =  $request['chooseFile2'];
                $file_extension = $file2->getClientOriginalName();
                $destination_path = public_path() . '/requirements';
                $filename2 = $file_extension;
                $request['chooseFile2']->move($destination_path, $filename);
                $request['chooseFile2'] = $filename2;
                $reportcard = $request['chooseFile2']; 
 


        $user = User::create([
         
            'email' => $request['email'],
            'password' => Hash::make($password),
            'name' => $request['name'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],

          'lastgradelevelcompleted' => $request['lastgradelevelcompleted'] ,
          'strandtoenrolin' => $request['strandtoenrolin'],
          'semester'=> $request['semester'],
          'studenttype'=> $request['studenttype'],
          'indegenouscommunity' => $request['indegenouscommunity'],
          'indigency'=> $request['indigency'],
          'currenthousenumber' => $request['currenthousenumber'],
          'currentbaranggay' => $request['currentbaranggay'],
          'currentmunicipality' => $request['currentmunicipality'],
          'currentprovince' => $request['currentprovince'],
          'permanenthousenumber'=> $request['permanenthousenumber'],
          'permanentbaranggay' => $request['permanentbaranggay'],
          'permanentmunicipality'=>$request['permanentmunicipality'],
          'permanentprovince'=>$request['permanentprovince'],
          'phonenumber'=>$request['phonenumber'],
          'birthday'=>$request['birthday'], 
          'age'=>$request['age'],
          'sex' =>$request['sex'],
          'mothertongue'=>$request['mothertongue'],
          'religion'=>$request['religion'], 
          'generalaverage' =>$request['generalaverage'],
          'lrnnumber' =>$request['lrnnumber'],
          'psastatus' =>$request['psastatus'],
          'psanumber' =>$request['psanumber'],
          'fatherfirstname' =>$request['fatherfirstname'],
          'fathermiddlename' =>$request['fathermiddlename'],
          'fatherlastname' =>$request['fatherlastname'],
          'fatherphonenumber' =>$request['fatherphonenumber'],
          'motherfirstname' =>$request['motherfirstname'],
          'mothermiddlename' =>$request['mothermiddlename'],
          'motherlastname' =>$request['motherlastname'],
          'motherphonenumber'=>$request['motherphonenumber'],
          'guardianfirstname' =>$request['guardianfirstname'],
          'guardianmiddlename'=>$request['guardianmiddlename'],
          'guardianlastname' =>$request['guardianlastname'],
          'guardianphonenumber'=>$request['guardianphonenumber'],
          'gradeleveltoenrolin' =>$request['gradeleveltoenrolin'],
          'lastschoolyearattended' =>$request['lastschoolyearattended'],
          'lastschoolattended' =>$request['lastschoolattended'],
          'schoolid'=>$request['schoolid'],
          'birthcertificate' =>  $filename,
          'reportcard' =>  $filename2,
          'updated' => 'No',
         'semester' => $request['semester']
        ]);

      DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'email_verified_at' => $date
                 ]);


        $user->roles()->attach(4);


       if (isset($request['modality'])) {
        $user->modalities()->attach($request['modality']);
        } 
         $email =  $request['email'];

            
        session()->flash('success','Please wait for your enrolment form to be evaluated');
         return redirect(URL('index'));
    }
}
