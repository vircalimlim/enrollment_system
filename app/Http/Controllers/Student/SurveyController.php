<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\SpecialLearner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;




class SurveyController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $id = $request->id;
    $user = User::where('id', $id)->first();
    return view('student.survey', ['user' => $user]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // dd($request->all());
    $id = $request['id'];
    $user = User::find($id);
    $email = $user->email;

    $user->speciallearners()->attach($request->except([
      'id',
      '_token',
      'indegenouscommunityradio',
      'indegenouscommunity',
      'specialneeds',
      'assistivedevices',
      /*'dyslexia',
      'dyscalculia',
      'writtenexpressiondisorder',
      'adhd',
      'autisimspectrumdisorder',
      'emotionaldisturbance',
      'speechorlanguageimpairment',
      'deafblindess'
      'orthopedicimpairment',
      'traumaticbraininjury"',
      'miltipledisabilities"',
      'others',*/
      'mobilityaids',
      'hearingaids',
      'cognitiveaids',
      'voicerecognition',
      'physicalmodifications',
      'lightweight',
      'adaptive',
      'devices',
      'tools',
      'assistiveothers',
      'fathereducation',
      'mothereducation',
      'guardianeducation',
      'indigency',
      'kindersibling',
      'grade1sibling',
      'grade2sibling',
      'grade3sibling',
      'grade4sibling',
      'grade5sibling',
      'grade6sibling',
      'grade7sibling',
      'grade8sibling',
      'grade9sibling',
      'grade10sibling',
      'grade11sibling',
      'grade12sibling',
      'othersibling',
      'parents/guardians',
      'eldersiblings',
      'grandparents',
      'extendedmembersofthefamily',
      'none',
      'independent',
      'cabletv',
      'non-cabletv',
      'basiccellphone',
      'smartphone',
      'tablet',
      'radio',
      'desktopcomputer',
      'laptop',
      'nonedevice',
      'internetconnection',
      'ownmobiledata',
      'brodbandinternet',
      'connectothers',
      'onlinelearning',
      'television',
      'modular',
      'radiomodality',
      'combination',
      'f2fparticipate',
      'consideration',
      'considerationspecification',
      'flexRadioDefault'
    ]));

    $user->assistivetools()->attach($request->except([

      'id',
      '_token',
      'indegenouscommunityradio',
      'indegenouscommunity',
      'specialneeds',
      'assistivedevices',
      'dyslexia',
      'dyscalculia',
      'writtenexpressiondisorder',
      'adhd',
      'autisimspectrumdisorder',
      'emotionaldisturbance',
      'speechorlanguageimpairment',
      'deafblindess',
      'orthopedicimpairment',
      'traumaticbraininjury',
      'miltipledisabilities',
      'others',
      /*'mobilityaids',
      'hearingaids',
      'cognitiveaids',
      'voicerecognition',
      'physicalmodifications',
      'lightweight',
      'adaptive',
      'devices',
      'tools',
      'assistiveothers',*/
      'fathereducation',
      'mothereducation',
      'guardianeducation',
      'indigency',
      'kindersibling',
      'grade1sibling',
      'grade2sibling',
      'grade3sibling',
      'grade4sibling',
      'grade5sibling',
      'grade6sibling',
      'grade7sibling',
      'grade8sibling',
      'grade9sibling',
      'grade10sibling',
      'grade11sibling',
      'grade12sibling',
      'othersibling',
      'parents/guardians',
      'eldersiblings',
      'grandparents',
      'extendedmembersofthefamily',
      'none',
      'independent',
      'cabletv',
      'non-cabletv',
      'basiccellphone',
      'smartphone',
      'tablet',
      'radio',
      'desktopcomputer',
      'laptop',
      'nonedevice',
      'internetconnection',
      'ownmobiledata',
      'brodbandinternet',
      'connectothers',
      'onlinelearning_',
      'television',
      'modular',
      'radiomodality',
      'combination',
      'f2fparticipate',
      'consideration',
      'considerationspecification',
      'flexRadioDefault'
    ]));

    $user->devices()->attach($request->except([
      'id',
      '_token',
      'indegenouscommunityradio',
      'indegenouscommunity',
      'specialneeds',
      'assistivedevices',
      'dyslexia',
      'dyscalculia',
      'writtenexpressiondisorder',
      'adhd',
      'autisimspectrumdisorder',
      'emotionaldisturbance',
      'speechorlanguageimpairment',
      'deafblindess',
      'orthopedicimpairment',
      'traumaticbraininjury',
      'miltipledisabilities',
      'others',
      'mobilityaids',
      'hearingaids',
      'cognitiveaids',
      'voicerecognition',
      'physicalmodifications',
      'lightweight',
      'adaptive',
      'devices',
      'tools',
      'assistiveothers',
      'fathereducation',
      'mothereducation',
      'guardianeducation',
      'indigency',
      'kindersibling',
      'grade1sibling',
      'grade2sibling',
      'grade3sibling',
      'grade4sibling',
      'grade5sibling',
      'grade6sibling',
      'grade7sibling',
      'grade8sibling',
      'grade9sibling',
      'grade10sibling',
      'grade11sibling',
      'grade12sibling',
      'othersibling',
      'parents/guardians',
      'eldersiblings',
      'grandparents',
      'extendedmembersofthefamily',
      'none',
      'independent',
      /*'cabletv',
      'non-cabletv',
      'basiccellphone',
      'smartphone',
      'tablet',
      'radio',
      'desktopcomputer',
      'laptop',
      nonedevice*/
      'internetconnection',
      'ownmobiledata',
      'brodbandinternet',
      'connectothers',
      'onlinelearning_',
      'television',
      'radiomodality',
      'modular',
      'combination',
      'f2fparticipate',
      'consideration',
      'considerationspecification',
      'flexRadioDefault'
    ]));
    $user->internets()->attach($request->except([
      'id',
      '_token',
      'indegenouscommunityradio',
      'indegenouscommunity',
      'specialneeds',
      'assistivedevices',
      'dyslexia',
      'dyscalculia',
      'writtenexpressiondisorder',
      'adhd',
      'autisimspectrumdisorder',
      'emotionaldisturbance',
      'speechorlanguageimpairment',
      'deafblindess',
      'orthopedicimpairment',
      'traumaticbraininjury',
      'miltipledisabilities',
      'others',
      'mobilityaids',
      'hearingaids',
      'cognitiveaids',
      'voicerecognition',
      'physicalmodifications',
      'lightweight',
      'adaptive',
      'devices',
      'tools',
      'assistiveothers',
      'fathereducation',
      'mothereducation',
      'guardianeducation',
      'indigency',
      'kindersibling',
      'grade1sibling',
      'grade2sibling',
      'grade3sibling',
      'grade4sibling',
      'grade5sibling',
      'grade6sibling',
      'grade7sibling',
      'grade8sibling',
      'grade9sibling',
      'grade10sibling',
      'grade11sibling',
      'grade12sibling',
      'othersibling',
      'parents/guardians',
      'eldersiblings',
      'grandparents',
      'extendedmembersofthefamily',
      'none',
      'independent',
      'cabletv',
      'non-cabletv',
      'basiccellphone',
      'smartphone',
      'tablet',
      'radio',
      'desktopcomputer',
      'laptop',
      'nonedevice',
      'internetconnection',
      /*'ownmobiledata',
      'brodbandinternet',
      'connectothers',*/
      'onlinelearning_',
      'television',
      'modular',
      'combination',
      'radiomodality',
      'f2fparticipate',
      'consideration',
      'considerationspecification',
      'flexRadioDefault'
    ]));
    $user->modalities()->attach($request->except([
      'id',
      '_token',
      'indegenouscommunityradio',
      'indegenouscommunity',
      'specialneeds',
      'assistivedevices',
      'dyslexia',
      'dyscalculia',
      'writtenexpressiondisorder',
      'adhd',
      'autisimspectrumdisorder',
      'emotionaldisturbance',
      'speechorlanguageimpairment',
      'deafblindess',
      'orthopedicimpairment',
      'traumaticbraininjury',
      'miltipledisabilities',
      'others',
      'mobilityaids',
      'hearingaids',
      'cognitiveaids',
      'voicerecognition',
      'physicalmodifications',
      'lightweight',
      'adaptive',
      'devices',
      'tools',
      'assistiveothers',
      'fathereducation',
      'mothereducation',
      'guardianeducation',
      'indigency',
      'kindersibling',
      'grade1sibling',
      'grade2sibling',
      'grade3sibling',
      'grade4sibling',
      'grade5sibling',
      'grade6sibling',
      'grade7sibling',
      'grade8sibling',
      'grade9sibling',
      'grade10sibling',
      'grade11sibling',
      'grade12sibling',
      'othersibling',
      'parents/guardians',
      'eldersiblings',
      'grandparents',
      'extendedmembersofthefamily',
      'none',
      'independent',
      'cabletv',
      'non-cabletv',
      'basiccellphone',
      'smartphone',
      'tablet',
      'radio',
      'desktopcomputer',
      'laptop',
      'nonedevice',
      'internetconnection',
      'ownmobiledata',
      'brodbandinternet',
      'connectothers',
      /*'onlinelearning_',
      'television',
      'modular',
      'combination',
        'radiomodality',  */
      'f2fparticipate',
      'consideration',
      'considerationspecification',
      'flexRadioDefault'
    ]));
    $user->instructionalsupports()->attach($request->except([

      '_token',
      'indegenouscommunityradio',
      'indegenouscommunity',
      'specialneeds',
      'assistivedevices',
      'dyslexia',
      'dyscalculia',
      'writtenexpressiondisorder',
      'adhd',
      'autisimspectrumdisorder',
      'emotionaldisturbance',
      'speechorlanguageimpairment',
      'deafblindess',
      'orthopedicimpairment',
      'traumaticbraininjury',
      'miltipledisabilities',
      'others',
      'mobilityaids',
      'hearingaids',
      'cognitiveaids',
      'voicerecognition',
      'physicalmodifications',
      'lightweight',
      'adaptive',
      'devices',
      'tools',
      'assistiveothers',
      'fathereducation',
      'mothereducation',
      'guardianeducation',
      'indigency',
      'kindersibling',
      'grade1sibling',
      'grade2sibling',
      'grade3sibling',
      'grade4sibling',
      'grade5sibling',
      'grade6sibling',
      'grade7sibling',
      'grade8sibling',
      'grade9sibling',
      'grade10sibling',
      'grade11sibling',
      'grade12sibling',
      'othersibling',
      /*'parents/guardians',
      'eldersiblings',
      'grandparents',
      'extendedmembersofthefamily',
      'none',
      'independent',*/
      'cabletv',
      'non-cabletv',
      'basiccellphone',
      'smartphone',
      'tablet',
      'radio',
      'desktopcomputer',
      'laptop',
      'nonedevice',
      'internetconnection',
      'ownmobiledata',
      'brodbandinternet',
      'connectothers',
      'onlinelearning',
      'television',
      'modular',
      'radiomodality',
      'combination',
      'f2fparticipate',
      'consideration',
      'considerationspecification',
      'flexRadioDefault'
    ]));
    /*$user->assistivetools()->sync([1, 2, 3]);
         $user->devices()->sync([1, 2, 3]);
         $user->internets()->sync([1, 2, 3]);
         $user->modalities()->sync([1, 2, 3]);
         $user->instructionalsupports()->sync([1, 2, 3]);*/


    $user->indegenousgroup = $request['indegenouscommunity'];
    $user->fathereducation = $request['fathereducation'];
    $user->mothereducation = $request['mothereducation'];
    $user->guardianeducation = $request['guardianeducation'];
    $user->indigent = $request['indigent'];
    $user->kindersibling = $request['kindersibling'];
    $user->grade1sibling = $request['grade1sibling'];
    $user->grade2sibling = $request['grade2sibling'];
    $user->grade3sibling = $request['grade3sibling'];
    $user->grade4sibling = $request['grade4sibling'];
    $user->grade5sibling = $request['grade5sibling'];
    $user->grade6sibling = $request['grade6sibling'];
    $user->grade7sibling = $request['grade7sibling'];
    $user->grade8sibling = $request['grade8sibling'];
    $user->grade9sibling = $request['grade9sibling'];
    $user->grade10sibling = $request['grade10sibling'];
    $user->grade11sibling = $request['grade11sibling'];
    $user->grade12sibling = $request['grade12sibling'];
    $user->othersibling = $request['othersibling'];
    $user->internetconnection = $request['internetconnection'];
    $user->f2fparticipate = $request['f2fparticipate'];
    $user->consideration = $request['considerationspecification'];

    $user->save();


    $request->session()->flash('success', 'You are almost done! Please set a password for your student account.');

    return redirect(URL::signedRoute('student.resetview', ['email' => $email]));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($email)
  {
    dd($email);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
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
    $email = $request->email;



    $userrole = DB::table('role_user')->where('email', $email)->first();

    $role = $userrole->role_id;


    if (($role  == '3') || ($role == '4')) {

      dd('You are not eligible for a password reset');
    }


    Validator::make($input, [
      'password' => $this->passwordRules(),
    ])->validate();

    $user->forceFill([
      'password' => Hash::make($input['password']),
    ])->save();

    return view('auth/login');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
