<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfiles';

    protected $fillable = [
        'descripcion'
    ];

    protected $hidden = [
      'created_at', 'updated_at'
    ];
    
    public function users()
    {
    	return $this->hasMany('App\Models\User');
    }
}
