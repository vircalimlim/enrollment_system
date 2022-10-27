<?php

namespace App\Http\Controllers\FacultyLoading;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sections;
use App\Models\User;

class SectionDeleteView extends Controller
{
     
     public function __invoke($id)
    {

    $section = Sections::find($id);

  return view('sections.sectiondeleteview',['section' =>  $section],['students' => User::where('section', $id)->paginate(10)]);

}

}
