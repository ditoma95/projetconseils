<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class Passager extends Model
{
    use Notifiable;
    use HasFactory;
    use HasRoles;

    protected $fillable = [
        'passager_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
