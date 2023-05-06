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
                                        <h5 class="font-weight-bold">Editar Personal</h5>

                                        <a href="{{ route('users.index') }}" class="btn btn-info mb-4">Personal</a>

                                        <form action="{{ route('users.update', $data->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
              
                                            <div class="row">
                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <label>Nombre</label>
                                                        <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
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
                                                        <label>Turno</label>
                                                        <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="turno">
                                                          <option value="Mañana">Mañana</option>
                                                          <option value="Tarde">Tarde</option>
                                                          <option value="Noche">Noche</option>
                                                        </select>
                                                      </div>


                                                </div>
                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <label>Apellidos</label>
                                                        <input type="text" class="form-control" name="apellidos"  value="{{$data->apellidos}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="email" value="{{$data->email}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Direccion</label>
                                                        <textarea name="direccion" rows="5" cols="5" class="form-control"  value="" >{{$data->direccion}}</textarea>

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
                                                        <label>Codigo de Nomina</label>
                                                        <input type="text" class="form-control" name="code_nomina"  value="{{$data->code_nomina}}"
                                                        required>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control" name="password"  
                                                            >
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
