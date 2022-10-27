<?php

namespace App\Http\Controllers\FacultyLoading;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subjects;
use App\Models\SubjectTeacher;


class SubjectDeleteView extends Controller
{
    public function __invoke($id)
    {

    $subject = Subjects::find($id);

  return view('subjects.subjectdeleteview',['subject' =>  $subject],['subjects' => SubjectTeacher::where('subjects_id', $id)->paginate(10)]);
}

}
