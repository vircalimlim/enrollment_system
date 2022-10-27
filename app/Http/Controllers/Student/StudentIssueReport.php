<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentIssueReport extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

 $id = Auth::id(); 

$issues = DB::table('issue_reports')->where('user_id', $id)->paginate(10);




return view('student.report_issue.index',['issues' => $issues,'id'=>Auth::id()] );
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $id = Auth::id(); 
    $user = User::find($id);

    return view('student.report_issue.create',['user' => $user]);
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

         $id = Auth::id(); 
            $user = User::find($id);

 $extension ='Directed to admin : ';

$title = $extension.$request['title'];
             DB::table('issue_reports')->insert([
            'user_id' =>  $id,
             'message' =>  $request['specification'],
             'title' =>  $title,
           'status' =>  'unsolved',
             ]);

   $request->session()->flash('success','You have successfully created a thread');

      return redirect(route('enrolledstudent.student_issue_report.index'));
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      
        $user = User::find( Auth::id());

      $message = DB::table('issue_reports_reply')->where('issue_reports_id',$id)->where('user_id','!=',$user->id)->latest()->first();
   //dd($message);
           return view('student.report_issue.reply',['user' => $user,'message' => $message]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
              $user = User::find( Auth::id());

        $message = DB::table('issue_reports')->where('id',$id)->first();
   //dd($message);
           return view('student.report_issue.edit',['user' => $user,'message' => $message]);
    
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
      //   dd($request->all());


             DB::table('student_reply')->insert([
            'user_id' =>  Auth::id(),
             'message' =>  $request['specification'],
             'issue_reports_reply_id' =>  $id,
      
             ]);

   $request->session()->flash('success','You have successfully replied');

      return redirect(route('enrolledstudent.student_issue_report.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
       //dd($request->all()); 
            
          

             DB::table('issue_reports')->where('id',$id)->update([

            'message' =>  $request['specification'],
             'title' =>  $request['title']
          

             ]);
          
      
          

   $request->session()->flash('success','You have successfully edited an issue report. Please wait for its evaluation');

      return redirect(route('enrolledstudent.student_issue_report.index'));
    }
}
