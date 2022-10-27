<?php

namespace App\Http\Controllers\FacultyLoading;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
use App\Models\SchoolYear;
use App\Models\User;
use App\Models\Role;

class SchoolYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//dd($request->all());

$enrolment_start = Carbon::createFromDate($request['year'],$request['month_start'], $request['date_start']);

$enrolment_end = Carbon::createFromDate($request['year'] + 1,$request['month_end'], $request['date_end']);

$schoolyear = SchoolYear::create([
    'year_start' => $enrolment_start->year,
    'year_end' => $enrolment_end->year,
    'enrolment_start' => $enrolment_start,
    'enrolment_end' => $enrolment_end,
    'status' => 'active'
]);


Role::where('name', 'Declined')->first()->users()->delete();

Role::where('name', 'Pending')->first()->users()->delete();

Role::where('name', 'Re-enrollee')->first()->users()->delete();

DB::table('schoolyear')
                ->where('id', $request['current_schoolyear'])
                ->update([
                    'status' => 'inactive'
                 ]);

DB::table('users')
            ->whereNull('section')->orWhere('gradeleveltoenrolin' ,'Grade 12')->delete();



DB::table('role_user')
                ->where('role_id', '3')->orWhere('role_id','4')->orWhere('role_id','5')
                ->delete();

DB::table('role_user')
                ->where('role_id', '2')
                ->update([
                    'role_id' => '3'
                 ]);


 $request->session()->flash('success','A new schoolyear is created');
        return redirect(URL::previous());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
       // dd($request->all());

        $schoolyear = SchoolYear::find($id);

$enrolment_start = Carbon::createFromDate($request['year'],$request['month_start'], $request['date_start']);

$enrolment_end = Carbon::createFromDate($request['year'] + 1,$request['month_end'], $request['date_end']);

        $schoolyear->year_start = $request['year'];

        $schoolyear->year_end = $request['year'] + 1 ;

        $schoolyear->enrolment_start = $enrolment_start;

        $schoolyear->enrolment_end = $enrolment_end;

        $schoolyear->save();

        $request->session()->flash('success','School Year has been updated');
        return redirect(URL::previous());

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
          //   dd($id);

    if($request['status'] == 'active'){

        DB::table('schoolyear')
                ->where('id', $id)
                ->update([
                    'status' => 'paused'
                 ]);
    }


    if($request['status'] == 'paused'){

        DB::table('schoolyear')
                ->where('id', $id)
                ->update([
                    'status' => 'active'
                 ]);
    }

         $request->session()->flash('success','Status has been changed');
        return redirect(URL::previous());

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
