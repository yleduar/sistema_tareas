<?php

namespace App\Http\Controllers\Tareas;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TareaRequest;
use App\Models\Tarea;
use App\Models\User;
use Carbon\Carbon;

class TareasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->tareas = new Tarea();
    }
    
    public function index()
    {
        return view('tareas/index');
    }

    public function dashboard()
    {

        $listado = $this->tareas->listaInformacion();

            return DataTables::of($listado) 
            ->addColumn('completar', function($data){

                $completar = $data->estado_id != 2 ? '<a class="btn btn-success  btn-sm" href="tarea-completar/'.$data->id.'" title="Marcar como completadada"><span class="bi-check-circle"></span></a>' : '';
                return $completar;

            })
            ->addColumn('editar', function($data){

                $editar = $data->estado_id != 2 ? '<a class="btn btn-primary  btn-sm" href="tarea-edit/'.$data->id.'" title="Editar"><span class="bi-pencil-fill"></span></a>' : '';
                return $editar;

            })
            ->addColumn('borrar', function($data){

                $borrar =  $data->estado_id != 2 ? '<a class="btn btn-dark  btn-sm" href="tarea-borrar/'.$data->id.'" title="Borrar"><span class="bi-trash"></span></a>' : '';
                return $borrar;
            })
            ->addColumn('estado', function($data){

                $clase = $data->estado_id == 1 ? 'warning' : 'success';

                $estado = '<span class="badge bg-'.$clase.'  btn-sm" href="tarea-completa/'.$data->id.'">'.$data->estado.'</span>';
                return $estado;
            })
            ->addColumn('fecha_comprometida', function($data){

                $fecha = Carbon::createFromFormat('Y-m-d', $data->fecha_comprometida)->format('d-m-Y');
                return $fecha;

            })
            ->rawColumns(['editar', 'borrar', 'estado', 'completar'])
            ->toJson();
    }
    
    public function registrar()
    {
        
        $usuario = new User();
        $usuarios = $usuario->listaUsuarios();
        return view('tareas/registrar', compact('usuarios'));
    }
    
    public function guardar(TareaRequest $request)
    {
        $tarea = new Tarea();
        $tarea->user_id = $request['user_id'];
        $tarea->nombre = $request['nombre'];
        $tarea->descripcion = $request['descripcion'];
        $tarea->fecha_comprometida = $request['fecha_comprometida'];
        try {
            
            $tarea->save();
            
        } catch (\Throwable $th) {
            redirect('/tareas')->with(['general_messege'=>true, 'mensaje'=>'Error al procesar los datos', 'clase'=>'danger']);
        }

        return redirect('/tareas')->with(['general_messege'=>true, 'mensaje'=>'Proceso Realizado con Éxito', 'clase'=>'success']);
        
    }

    public function completadas()
    {
        
        try {
            
            $result = $this->tareas::whereRaw('fecha_comprometida < DATE_ADD(CURDATE(),INTERVAL -7 DAY)')
            ->where('estado_id', 2)
            ->update(['estado_id' => 0]);
            
        } catch (\Throwable $th) {
            redirect('/tareas')->with(['general_messege'=>true, 'mensaje'=>'Error al procesar los datos', 'clase'=>'danger']);
        }

        return redirect('/tareas')->with(['general_messege'=>true, 'mensaje'=>'Proceso Realizado con Éxito', 'clase'=>'success']);
    }

    public function borrar($id, Request $request)
    {
        $registro_id = $id;
        
        
        try {
            
            $registro = $this->tareas::find($registro_id);
            $registro->estado_id = 0;
            $registro->save();
            
        } catch (\Throwable $th) {
            redirect('/tareas')->with(['general_messege'=>true, 'mensaje'=>'Error al procesar los datos', 'clase'=>'danger']);
        }
        
        return redirect('/tareas')->with(['general_messege'=>true, 'mensaje'=>'Proceso Realizado con Éxito', 'clase'=>'success']);

    }

    public function completar($id, Request $request)
    {
        $registro_id = $id;
        
        
        try {
            
            $registro = $this->tareas::find($registro_id);
            $registro->estado_id = 2;
            $registro->save();
            
        } catch (\Throwable $th) {
            redirect('/tareas')->with(['general_messege'=>true, 'mensaje'=>'Error al procesar los datos', 'clase'=>'danger']);
        }
        
        return redirect('/tareas')->with(['general_messege'=>true, 'mensaje'=>'Proceso Realizado con Éxito', 'clase'=>'success']);

    }
}
