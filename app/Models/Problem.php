<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Problem extends Model
{
    use HasFactory;

    protected  $table = "problemes";

    protected $fillable = [
        "contenu","context","user_id"
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function conseils(): HasMany
    {
        return $this->hasMany(Conseil::class);
    }

    
}
