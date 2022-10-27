<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;


    public function subjects()
    {
        return $this->belongsToMany(Subjects::class);
    }


    public function announcements()
    {
        return $this->belongsToMany(Announcements::class);
    }
}
