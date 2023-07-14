@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><img src="{{asset('img/logo.png')}}" width="20"> Registrar Tarea</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tarea-guardar') }}">
                        @csrf
                        @if( Auth::user()->perfil_id == 1 )
                            <div class="form-group">
                                <label for="user_id">Usuario:</label>
                                <select name="user_id" id="user_id" class="form-control" required>
                                    <option>-- Seleccione --</option>
                                @foreach ($usuarios as $key_usuario => $usuario)
                                    <option class="d-flex align-items-center"> {{ $usuario['nombre'] }}</option>

                                @endforeach
                                </select> 
                            </div>
                        @else
                            <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->perfil_id }}">
                        @endif
                        <div class="form-group">
                            <label for="nombre">Tarea:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="fecha_comprometida">Fecha Comprometida:</label>
                            <div class="input-group date" id="datepicker">
                                <input type="text" class="form-control datepicker" name="fecha_comprometida" id="fecha_comprometida" value="{{ date('Y-m-d')}} "/>
                                <span class="input-group-append">
                                <span class="input-group-text bg-light d-block">
                                    <i class="bi-calendar-date"></i>
                                </span>
                                </span>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-5">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Inicializar el calendario de Bootstrap --><!-- Incluir los archivos necesarios para el calendario de Bootstrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-  datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<script>
    $(document).ready(function() {
        $('#fecha_comprometida').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        });
    });
</script>

@endsection
