<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appeal extends Model
{
    use HasFactory;

     protected $table = 'appeals';

    protected $fillable = [
            'message'
           ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

  