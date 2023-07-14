<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Tarea extends Model
{

    protected $table = 'tareas';

    protected $fillable = [
        'name',
        'email',
        'password',
        'perfil_id',
        'estado_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function listaInformacion()
    {

        $datos  =   Tarea::select([
                            'tareas.id',
                            'estados.descripcion AS estado',
                            'users.name AS nombre',
                            'tareas.descripcion AS tarea',
                            'tareas.fecha_comprometida',
                            'tareas.estado_id'
                            ])
                    ->join('users', 'tareas.user_id', '=', 'users.id')
                    ->join('estados', 'tareas.estado_id', '=', 'estados.id')
                    ->orderby('users.created_at', 'DESC')
                    ->where('tareas.estado_id', '>', 0);
            if(Auth::user()->perfil_id != 1){
                $datos->where('tareas.user_id', '=', Auth::user()->id);
            }
        $datos->get();

        return $datos;
    }
}
