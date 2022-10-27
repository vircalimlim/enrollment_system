<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectTeacher extends Model
{
    use HasFactory;
  protected $table = 'subjects_teachers';
    public function teachers()
    {
        return $this->belongsToMany(Teachers::class);
    }
     
    public function subjects()
    {
        return $this->belongsToMany(Subjects::class);
    }
}
