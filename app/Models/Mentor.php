<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
class Mentor extends Model
{
    use HasFactory;
    use HasRoles;
    use Notifiable;
    
    
    protected $fillable = [
        'mentor_id',
        'permis_image',
    ];

    protected $guard_name = 'web';


    public function user(){
        return $this->belongsTo(User::class);
    }
}
