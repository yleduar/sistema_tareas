<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\Datatables;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->usuarios = new User();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('usuarios/index');
    }

    public function dashboard()
    {

        $listado = $this->usuarios->listaInformacion();
            
            return DataTables::of($listado)  
            ->addColumn('editar', function($data){

                $editar = '<a class="btn btn-primary  btn-sm" href="user-edit/'.$data->id.'"><span class="bi-pencil-fill"></span></a>';
                return $editar;

            })
            ->addColumn('borrar', function($data){

                $borrar = '<a class="btn btn-dark  btn-sm" href="user-delete/'.$data->id.'"><span class="bi-trash"></span></a>';
                return $borrar;
            })
            ->rawColumns(['editar', 'borrar'])
            ->toJson();
    }
}
