<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conseil extends Model
{
    use HasFactory;

    protected $fillable = [
        "problem_id", "reponse", "avis", "mentor_id"
    ];

    protected $table = "conseils";

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }


}
