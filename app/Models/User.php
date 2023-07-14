<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'perfil_id',
        'estado_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function listaInformacion()
    {

        $datos  =   User::select([
                            'users.id',
                            'users.name AS nombre',
                            'perfiles.descripcion AS perfil'
                            ])
                    ->join('perfiles', 'users.perfil_id', '=', 'perfiles.id')
                    ->where('users.estado_id', '>', 0)
                    ->orderby('users.name', 'ASC')
                    ->get();

        return $datos;
    }
    
    public function listaUsuarios($cliente_id = null)
    {
        return User::select([
                            'id',
                            'name AS nombre'
                        ])
                        ->get()
                        ->toArray();
    }
}
