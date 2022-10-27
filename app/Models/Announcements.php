<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    use HasFactory;


     protected $table = 'announcements';

    protected $fillable = [
            'title',
            'content',
            'image'
           ];

    public function grades()
    {
        return $this->belongsToMany(Grades::class);
    }
}
