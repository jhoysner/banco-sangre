@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            {{-- <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol> --}}
        </section>

        <!-- Main content -->
        <section class="">
            <div class="main">
                <div class="container">
                    <div class="margin-bottom-40">
                        <div class="x_content">
                            <div class="box-body" style="">
                                @if (Session::has('message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('message') }}!</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="container">
                                        <h5 class="font-weight-bold">Editar Donante</h5>

                                        <a href="{{ route('donante.index') }}" class="btn btn-info mb-4">Donantes</a>

                                        <form action="{{ route('donante.update', $data->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
              
                                            <div class="row">
                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <label>Nombre</label>
                                                        <input type="text" class="form-control" name="nombres"  value="{{$data->nombres}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Fecha Nacimiento</label>
                                                        <input type="date" class="form-control" name="fecha_nacimiento"  value="{{$data->fecha_nacimiento}}" required>
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Edad</label>
                                                        <input type="text" class="form-control" name="edad"  value="{{$data->edad}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tipo de Donacion</label>
                                                        <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="tipo_donacion">
                                                          <option value="Voluntaria">Voluntaria</option>
                                                          <option value="Dirigida a Paciente">Dirigida a Paciente</option>
                                                          <option value="Auto Donación">Auto Donación</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Direccion del Trabajo</label>
                                                        <textarea name="direccion_trabajo" rows="5" cols="5" class="form-control" >{{$data->direccion_trabajo}}</textarea>

                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Apellidos</label>
                                                        <input type="text" class="form-control" name="apellidos"  value="{{$data->apellidos}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="email"  value="{{$data->email}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Fecha de Donacion</label>
                                                        <input type="date" class="form-control" name="fecha_donacion"  value="{{$data->fecha_donacion}}" required>
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Profesion</label>
                                                        <input type="text" class="form-control" name="profesion"  value="{{$data->profesion}}" required>
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Direccion</label>
                                                        <textarea name="direccion" rows="5" cols="5" class="form-control"> {{$data->direccion}}</textarea>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    
                                                    <div class="form-group">
                                                        <label>Cedula</label>
                                                        <input type="text" class="form-control" name="cedula"  value="{{$data->cedula}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Telefono</label>
                                                        <input type="text" class="form-control" name="telefono"  value="{{$data->telefono}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Serial</label>
                                                        <input type="text" class="form-control" name="serial" value="{{$data->serial}}" required>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Lugar de Nacimiento</label>
                                                        <input type="text" class="form-control" name="lugar_nacimiento" value="{{$data->lugar_nacimiento}}" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Nombre del Paciente</label>  <span style="color: blue;
                                                        font-size: 12px;">*Llenar si es Dirigida a Paciente</span>
                                                        <input type="text" class="form-control" name="nombre_paciente" value="{{$data->nombre_paciente}}">
                                                    </div>
                                                    
                                                </div>

                                            </div>
                                            <button type="submit" class="btn btn-success mt-2">Actualizar</button>

                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection()
