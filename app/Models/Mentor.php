<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
class Mentor extends Model
{
    use HasFactory;
    use HasRoles;
    use Notifiable;
    
    
    protected $fillable = [
        
        'annee_experience',
        "domaine_experience",
        "biographie",
        "user_id"
    ];

    protected $guard_name = 'web';


    public function user(){
        return $this->belongsTo(User::class);
    }


    public function conseils(): HasMany
    {
        return $this->hasMany(Conseil::class);
    }


    public function sessions(): HasMany
    {
        return $this->hasMany(SessionMentorat::class);
    }

    public function problems(): BelongsToMany
    {
        return $this->belongsToMany(Problem::class);
    }
}
