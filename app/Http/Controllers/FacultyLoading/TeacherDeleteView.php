<?php

namespace App\Http\Controllers\FacultyLoading;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teachers;
use App\Models\SubjectTeacher;


class TeacherDeleteView extends Controller
{
    public function __invoke($id)
    {


     $teacher = Teachers::find($id);

  return view('teachers.teacherdelete',['teacher' =>  $teacher],['subjects' => SubjectTeacher::where('teachers_id', $id)->paginate(10)]);

}

}
