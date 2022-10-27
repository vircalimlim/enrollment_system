<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strands extends Model
{
    use HasFactory;
    
        public function subjects()
    {
        return $this->belongsToMany(Subjects::class);
    }

        public function subjectteacher()
    {
        return $this->belongsToMany(SubjectTeacher::class);
    }
}
