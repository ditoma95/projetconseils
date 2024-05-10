<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorProblem extends Model
{
    use HasFactory;

    protected $fillable = [
        'mentor_id',
        'problem_id',
        
    ];

    protected $table = 'mentor_problem';

   
   
}
