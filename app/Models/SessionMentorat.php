<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionMentorat extends Model
{
    use HasFactory;


    protected $fillable  = [
        "images","titre",'contenu','mentor_id','is_publisher'
    ];

    protected $table = "sessionsmentors";


    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }


}
