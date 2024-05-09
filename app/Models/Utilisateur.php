<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Model
{
    use Notifiable;
    use HasFactory;
    use HasRoles;

    protected $fillable = [
        'utilisateur_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
