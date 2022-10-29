<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class Statistics extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
    
   

     $female = User::whereHas('roles', function($query) {

      $query->where('sex','female')->whereIn('name', ['accepted', 'Accepted']);

      })->count();

     $male = User::whereHas('roles', function($query) {

      $query->where('sex','male')->whereIn('name', ['accepted', 'Accepted']);

      })->count();

     $transferee = User::whereHas('roles', function($query) {

      $query->where('studenttype','Transferee')->whereIn('name', ['accepted', 'Accepted']);

      })->count();


     $old = User::whereHas('roles', function($query) {

      $query->where('studenttype','Old Student')->whereIn('name', ['accepted', 'Accepted']);

      })->count();

  
$top_mothertounge = DB::table('users')
    ->select('mothertongue')
    ->groupBy('mothertongue')
    ->orderByRaw('COUNT(*) DESC')
    ->limit(1)
    ->first();

$top_municipality = DB::table('users')
    ->select('permanentmunicipality')
    ->groupBy('permanentmunicipality')
    ->orderByRaw('COUNT(*) DESC')
    ->limit(1)
    ->first();

$top_baranggay = DB::table('users')
    ->select('permanentbaranggay')
    ->groupBy('permanentbaranggay')
    ->orderByRaw('COUNT(*) DESC')
    ->limit(1)
    ->first();

$top_province = DB::table('users')
    ->select('permanentprovince')
    ->groupBy('permanentprovince')
    ->orderByRaw('COUNT(*) DESC')
    ->limit(1)
    ->first();

$top_modality = DB::table('modality_user')
    ->select('modality_id')
    ->groupBy('modality_id')
    ->orderByRaw('COUNT(*) DESC')
    ->limit(1)
    ->first();

     $returning = User::whereHas('roles', function($query) {

      $query->where('studenttype','Balik Aral/Returning Student')->whereIn('name', ['accepted', 'Accepted']);

      })->count();

 $present_schoolyear = SchoolYear::where('status','active')->orWhere('status','paused')->first();

 $past_schoolyear = SchoolYear::where('year_start',$present_schoolyear->year_start - 1)->first();

 $past = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start - 1)->count();
 $present = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start)->count();


  $past_gas = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start - 1)->where('grade', 'Grade 11')->orWhere('grade', 'Grade 12')->where('strand', 'GAS')->count();

  $past_humms = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start - 1)->where('grade', 'Grade 11')->orWhere('grade', 'Grade 12')->where('strand', 'HUMMS')->count();

  $past_tvl= DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start - 1)->where('grade', 'Grade 11')->orWhere('grade', 'Grade 12')->where('strand', 'TVL')->count();

  $past_cookery = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start - 1)->where('grade', 'Grade 11')->orWhere('grade', 'Grade 12')->where('strand', 'COOKERY')->count();

  $past_ict = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start - 1)->where('grade', 'Grade 11')->orWhere('grade', 'Grade 12')->where('strand', 'ICT')->count();

  $past_abm = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start - 1)->where('grade', 'Grade 11')->orWhere('grade', 'Grade 12')->where('strand', 'ABM')->count();

  $past_stem = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start - 1)->where('grade', 'Grade 11')->orWhere('grade', 'Grade 12')->where('strand', 'STEM')->count();



  $past_g7 = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start - 1)->where('grade', 'Grade 7')->count();

    $past_g8 = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start - 1)->where('grade', 'Grade 8')->count();

  $past_g9 = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start - 1)->where('grade', 'Grade 9')->count();

  $past_g10 = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start - 1)->where('grade', 'Grade 10')->count();

  $past_g11 = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start - 1)->where('grade', 'Grade 11')->count();

  $past_g12 = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start - 1)->where('grade', 'Grade 12')->count();


  $present_gas = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start)->where('grade', 'Grade 11')->orWhere('grade', 'Grade 12')->where('strand', 'GAS')->count();

  $present_humms = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start)->where('grade', 'Grade 11')->orWhere('grade', 'Grade 12')->where('strand', 'HUMMS')->count();

  $present_tvl= DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start)->where('grade', 'Grade 11')->orWhere('grade', 'Grade 12')->where('strand', 'TVL')->count();

  $present_cookery = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start)->where('grade', 'Grade 11')->orWhere('grade', 'Grade 12')->where('strand', 'COOKERY')->count();

  $present_ict = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start)->where('grade', 'Grade 11')->orWhere('grade', 'Grade 12')->where('strand', 'ICT')->count();

  $present_abm = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start )->where('grade', 'Grade 11')->orWhere('grade', 'Grade 12')->where('strand', 'ABM')->count();

  $present_stem = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start)->where('grade', 'Grade 11')->orWhere('grade', 'Grade 12')->where('strand', 'STEM')->count();


 $present_g7 = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start )->where('grade', 'Grade 7')->count();

$present_g8 = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start )->where('grade', 'Grade 8')->count();

  $present_g9 = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start )->where('grade', 'Grade 9')->count();

  $present_g10 = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start )->where('grade', 'Grade 10')->count();

  $present_g11 = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start )->where('grade', 'Grade 11')->count();

  $present_g12 = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start )->where('grade', 'Grade 12')->count();

        return view('admin.statistics',[

        'past' => $past,
        'past_schoolyear' => $past_schoolyear,

        'past_g7' => $past_g7,
        'past_g8' => $past_g8,
        'past_g9' => $past_g9,
        'past_g10' => $past_g10,
        'past_g11' => $past_g11,
        'past_g12' => $past_g12,

        'past_gas' => $past_gas,
        'past_humms' => $past_humms,
        'past_tvl' => $past_tvl,
        'past_cookery' => $past_cookery,
        'past_ict' => $past_ict,
        'past_abm' => $past_abm,
        'past_stem' => $past_stem,

        'present' => $present,
        'present_schoolyear' => $past_schoolyear,

         'present_gas' => $present_gas,
        'present_humms' => $present_humms,
        'present_tvl' => $present_tvl,
        'present_cookery' => $present_cookery,
        'present_ict' => $present_ict,
        'present_abm' => $present_abm,
        'present_stem' => $present_stem,

        'present_g7' => $present_g7,
        'present_g8' => $present_g8,
        'present_g9' => $present_g9,
        'present_g10' => $present_g10,
        'present_g11' => $present_g11,
        'present_g12' => $present_g12,

        'male' => $male,
        'female' => $female,

        'old' => $old,
        'returning' => $returning,
        'transferee' => $returning,

        'top_baranggay' => $top_baranggay,
        'top_municipality' => $top_municipality,
        'top_province' => $top_province,
        'top_modality' => $top_modality,
        'top_mothertounge' => $top_mothertounge


        ]);
    }
}
