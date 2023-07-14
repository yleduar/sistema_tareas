@extends('layouts.app')
@section('content')

<div class="w-100">
    <div class="container">
        
        <div class="card-body">
            
            <div class="card-header">Usuarios</div>
            <br>
            <div class="col-12">
                <div class="row mt-4">
                    <div class="table-responsive">
                        <table id="tabla-usuarios" class="table w-100 table-sm table-hover">
                            <thead>
                                <tr>
                                    <th width="5%" data-priority="2"></th>
                                    <th width="5%" data-priority="2"></th>
                                    <th width="60%" data-priority="2">Nombre</th>
                                    <th width="30%" data-priority="1">Perfil</th>
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
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>

<script src="{{ asset('js/usuarios.js') }}"></script>
@endsection