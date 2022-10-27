<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grades;
use App\Models\Strands;

class Subjects extends Model
{
    use HasFactory;

       protected $table = 'subjects';

       protected $fillable = [
        'name'
    ];

         public function teachers()
    {
        return $this->belongsToMany(Teachers::class);
    }
         public function strands()
    {
        return $this->belongsToMany(Strands::class);
    }
         public function grades()
    {
        return $this->belongsToMany(Grades::class);
    }
}
