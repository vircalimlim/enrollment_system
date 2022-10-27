<?php


namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class StudentIssueView extends Controller
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
          $user_id = Auth::id();

        $message = DB::table('issue_reports_reply')->where('issue_reports_id',$id)->orderBy('id', 'desc')->paginate(10);

        $issue = DB::table('issue_reports')->where('id',$id)->first();
   //dd($message);
           return view('student.report_issue.view',['issue' => $issue ,'messages' => $message ,'id' => $user_id]);
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
       

             DB::table('issue_reports_reply')->insert([
            'user_id' =>  Auth::id(),
             'message' =>  $request['specification'],
             'issue_reports_id' =>  $id,
             'created_at' => Carbon::now()
      
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
    public function destroy($id)
    {
        //
    }
}
