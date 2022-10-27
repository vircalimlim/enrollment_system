<?php

namespace App\Http\Controllers\FacultyLoading;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSectionRequest;
use App\Models\Sections;
use App\Models\Teachers;
use App\Models\Subjects;
use App\Models\User;
use Carbon;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(Gate::denies('logged-in')){

            dd('no access allowed');
          }
          if(Gate::allows('is-admin')){




    return view('sections.index',['sections'=> Sections::paginate(10)]);

          }

          dd('you need to be an admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        if(!isset($request['gradelevel'])){
        $request->session()->flash('error','Please choose a grade level to create a section in');
        return redirect(route('faculty.sections.index'));
        }

        if($request['gradelevel'] == 5 || $request['gradelevel'] == 6){

        if(!isset($request['strand'])){
        $request->session()->flash('error','Please choose a strand to create a section in');
        return redirect(route('faculty.sections.index'));
        }

        }

       $subjects = DB::table('grades_subjects')->where('grades_id',$request['gradelevel'])->get();  

       $teachers  = DB::table('teachers')->whereNull('advisory')->get(); 
       //dd($subjects->count());

       if($teachers->count() == 0){

        $request->session()->flash('error','There are no available teachers to act as an adviser');
        return redirect(route('faculty.sections.index'));

       }
// dd($subjects->count());

        if($subjects->count() < 8){

        $request->session()->flash('error',"Section cannot be created, subject assigned to grade is less than 8");
        return redirect(route('faculty.sections.index'));

       }


       if(isset($request['strand'])){

         return view('sections.sectionadd',['subjects' => $subjects ,'grade' => $request['gradelevel'], 'strand' => $request['strand'], 'teachers' => $teachers]);
        }

       return view('sections.sectionaddJHS',['subjects' => $subjects ,'grade' => $request['gradelevel'],'teachers' => $teachers]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSectionRequest $request)
    {
//dd($request->all());


   foreach($request['subject_teachers'] as $index => $teacher) {



$scheduleExists = DB::table('subjects_teachers_schedule')
->where('subjects_teachers_id',$request['subject_teachers'][$index])
->where('day', $request['day'][$index])
->where('start','>=', $request['starts_at'][$index])
->where('end','>=', $request['ends_at'][$index])
->exists();

if ($scheduleExists)
{
     $request->session()->flash('error',"There's a conflict with the schedule you have chosen");
       return redirect(route('faculty.sections.index'));

}

}



    $section = Sections::create($request->only([

            'section_number',
            'lower_gwa',
            'upper_gwa',     
            'grade',
            'strand'      
        ]));
 
         DB::table('teachers')->where('id', $request['adviser'])->update(['advisory' => $section->id]);
              


foreach($request['subject_teachers'] as $index => $teacher) {

      DB::table('subjects_teachers_schedule')->insert([
        'section_id' => $section->id,
        'subjects_teachers_id' => $request['subject_teachers'][$index],
        'day' => $request['day'][$index],
        'start' => $request['starts_at'][$index],
        'end' => $request['ends_at'][$index]
         ]); 
                        }
//dd($section->id);

     $request->session()->flash('success','A new section has been successfully created');
        return redirect(route('faculty.sections.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
     $section = Sections::find($id);

  return view('sections.sectionview',['section' =>  $section],['students' => User::where('section', $id)->paginate(10)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


    $section = Sections::find($id);

    $schedules = DB::table('subjects_teachers_schedule')->where('section_id',$id)->get();

    $adviser =   DB::table('teachers')->where('advisory', $id)->first();



       return view('sections.sectionedit',['section' => $section ,'adviser'=> $adviser,'schedules' => $schedules]);
      

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
       // /dd($request->all());
              
if(isset($request['subject_teachers'])){

           $section = Sections::find($id);
           $section->section_number = $request['section_number'];
           $section->upper_gwa = $request['upper_gwa'];
           $section->lower_gwa = $request['lower_gwa'];
           $section->save();


 DB::table('teachers')->where('id', $request['originaladviser'])->update(['advisory' => null ]);

 DB::table('teachers')->where('id', $request['adviser'])->update(['advisory' => $id]);

 foreach($request['subject_teachers'] as $index => $teacher) {

      DB::table('subjects_teachers_schedule')->where('id', $request['id'][$index])->update([
        'section_id' => $section->id,
        'subjects_teachers_id' => $request['subject_teachers'][$index],
        'day' => $request['day'][$index],
        'start' => $request['starts_at'][$index],
        'end' => $request['ends_at'][$index]
         ]); 
                        }
//dd($section->id);

     $request->session()->flash('success','Section has been successfully edited');
        return redirect(route('faculty.sections.index'));
   
}
else{

     $request->session()->flash('error','Cannot edit section');
        return redirect(route('faculty.sections.index'));
   

}


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Sections::where('id',$id)->delete();
       $request->session()->flash('success','Section have been removed from the database');

        return redirect(route('faculty.sections.index'));
    }

}