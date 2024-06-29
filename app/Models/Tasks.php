<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;
     

    protected $fillable = [
        'titre',
        "description",
        'status',
        'id_user',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'id_user', "id");
    }
}
