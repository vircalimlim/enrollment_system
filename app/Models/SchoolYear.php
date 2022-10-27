<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;


       protected $table = 'schoolyear';

       protected $dates = ['enrolment_start',

                          'enrolment_end'];

       protected $fillable = [
            'year_start',
            'year_end',
            'enrolment_start',
            'enrolment_end',
            'status'
           ];
}
