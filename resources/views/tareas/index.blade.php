@extends('layouts.app')
@section('content')

    <div class="w-100">
        <div class="container">
            
            <div class="card-body">
                
                <div class="card-header">Tareas</div>
                <br>
                <div class="col-12">
                    <div class="row mt-4">
                        <div class="row justify-content-end mb-5">
                            <div class="col-1 col-xs-12"><a class="btn btn-primary btn-sm" href="tarea-registrar"><span class="bi-list-task"></span>Registrar</a></div>
                            @if(Auth::user()->perfil_id == 1)
                                <div class="col-2 col-xs-12"><a class="btn btn-secondary btn-sm" href="tarea-completada"><span class="bi-trash"></span>Eliminar Completadas</a></div>
                            @endif
                        </div>
                        
                        <div class="table-responsive">
                            <table id="tabla-tareas" class="table w-100 table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th width="3%" data-priority="2"></th>
                                        <th width="3%" data-priority="2"></th>
                                        <th width="3%" data-priority="2"></th>
                                        <th width="10%" data-priority="1">Esatdo</th>
                                        <th width="30%" data-priority="1">Nombre</th>
                                        <th width="30%" data-priority="1">Tarea</th>
                                        <th width="10%" data-priority="1">Fecha Comprometida</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot align="right">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <script src="{{ asset('js/tareas.js') }}"></script>
@endsection