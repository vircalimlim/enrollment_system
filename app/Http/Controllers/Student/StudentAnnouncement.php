<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Announcements;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentAnnouncement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    $id = Auth::id(); 
    $user = User::find($id); 

    if($user->gradeleveltoenrolin == 'Grade 7'){

$announcements =DB::table('announcements_grades')->where('grades_id' ,'1')->get();

    }
    
    if($user->gradeleveltoenrolin == 'Grade 8'){

$announcements =DB::table('announcements_grades')->where('grades_id' ,'2')->get();
        
    }

     if($user->gradeleveltoenrolin == 'Grade 9'){

$announcements =DB::table('announcements_grades')->where('grades_id' ,'3')->get();
        
    }

     if($user->gradeleveltoenrolin == 'Grade 10'){

$announcements =DB::table('announcements_grades')->where('grades_id' ,'4')->get();
        
    }

     if($user->gradeleveltoenrolin == 'Grade 11'){

$announcements =DB::table('announcements_grades')->where('grades_id' ,'5')->get();
        
    }

     if($user->gradeleveltoenrolin == 'Grade 12'){

$announcements =DB::table('announcements_grades')->where('grades_id' ,'6')->get();
        
    }
    
    return view('student.announcement',['announcements' => $announcements]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('student.announcement_view',[ 'announcement' => DB::table('announcements')->where('id',$id)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
