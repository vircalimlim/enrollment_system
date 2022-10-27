<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('schoolyear')->insert([

            'year_start' => '2022',
            'year_end' => '2023',
            'enrolment_start' => '2022-01-1 12:03:09',
            'enrolment_end' => '2023-12-31 12:03:09',
            'status' => 'active'
        ]);
     DB::table('schoolyear')->insert([

            'year_start' => '2021',
            'year_end' => '2022',
            'enrolment_start' => '2022-01-1 12:03:09',
            'enrolment_end' => '2023-12-31 12:03:09',
            'status' => 'inactive'
        ]);

          $roles_users = DB::table('role_user')->where('role_id', '3')->get();
          foreach( $roles_users as $role_user ){

           $user = DB::table('users')->where('id', $role_user->user_id)->first();

             DB::table('user_schoolyear')->insert([

            'lrnnumber' =>  $user->lrnnumber,
            'schoolyear_start' => '2021',
            'schoolyear_end'=> '2022',
            'grade' =>  $user->gradeleveltoenrolin,
            'strand' =>  $user->strandtoenrolin
      
             ]);

          }
          $roles_users = DB::table('role_user')->where('role_id', '2')->get();
          foreach( $roles_users as $role_user ){

           $user = DB::table('users')->where('id', $role_user->user_id)->first();

             DB::table('user_schoolyear')->insert([

            'lrnnumber' =>  $user->lrnnumber,
            'schoolyear_start' => '2022',
            'schoolyear_end'=> '2023',
            'grade' =>  $user->gradeleveltoenrolin,
            'strand' =>  $user->strandtoenrolin
      
             ]);

          }
            DB::table('user_schoolyear')->insert([

            'lrnnumber' => '1111111111112',
            'schoolyear_start' => '2021',
            'schoolyear_end'=> '2022',
            'grade' =>  'Grade 11',
            'strand' =>  'TVL'
      
             ]);

               DB::table('user_schoolyear')->insert([

            'lrnnumber' => '1111111111113',
            'schoolyear_start' => '2021',
            'schoolyear_end' => '2022',
            'grade' =>  'Grade 12',
            'strand' =>  'HUMMS'
      
             ]);


             DB::table('user_schoolyear')->insert([

            'lrnnumber' => '1111111111114',
            'schoolyear_start' => '2021',
            'schoolyear_end'=> '2022',
            'grade' =>  'Grade 12',
            'strand' =>  'ABM'
      
             ]);

             DB::table('user_schoolyear')->insert([

            'lrnnumber' => '1111111111115',
            'schoolyear_start' => '2021',
            'schoolyear_end'=> '2022',
            'grade' =>  'Grade 7',
            'strand' => 'Not Applicable',
      
             ]);
    }
}
