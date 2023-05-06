
@extends('layouts.master')

@section('content')
<div class="content-wrapper">    
  <section class="content-header">

  </section>

    <!-- Main content -->
    <section class="content">
      <div class="main">
        <div class="container">
          <div class="margin-bottom-40">
            <div class="x_content">
              <div class="margin-bottom-40">
                <!-- EMPIEZA TABLAS-->
                @if(Session::has('message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('message')}}!</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>                
                  </div>
                @endif
                @if(Session::has('error'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('error')}}!</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>                
                  </div>
                @endif
            
                <h5 class="font-weight-bold">Consultar</h5>

                <form action="{{ route('consultar.index') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4" style="display: flex;
                        justify-content: center;
                        align-items: center;">
                            

                        <input type="text" class="form-control" name="cedula" placeholder="Cedula" required>
                        <button type="submit" class="btn btn-info ml-4" >Buscar</button>
                           

                    </div>
                </form>
              </div>

              <br><br>
              <div class="row">
                @if ($donante)
                <div class="container">

                  <h4 style="display:flex; justify-content:center;margin-bottom:3em"><strong>Datos Donante</strong></h4>
                    <div class="container">
                      <div class="d-flex mb-5">
                        <div class="col-md-3">
                          <span style="font-weight: bold; font-size:16px">Cedula : </span>{{$donante->serial}}
                        </div>
                        <div class="col-md-3">
                          <span style="font-weight: bold; font-size:16px">Serial : </span>{{$donante->serial}}
                        </div>
                        <div class="col-md-3">
                          <span style="font-weight: bold; font-size:16px">Nombres: </span> {{$donante->nombres}}
                        </div>
                        <div class="col-md-3">
    
                          <span style="font-weight: bold; font-size:16px">Apellidos:</span>  {{$donante->apellidos}}
                        </div>
                      </div>
                      <div class="d-flex mb-5">
                        <div class="col-md-3">
                          <span style="font-weight: bold; font-size:16px">Direccion : </span>{{$donante->direccion}}
                        </div>
                        <div class="col-md-3">
                          <span style="font-weight: bold; font-size:16px">Telefono : </span>{{$donante->telefono}}
                        </div>
                        <div class="col-md-3">
                          <span style="font-weight: bold; font-size:16px">Edad: </span> {{$donante->edad}}
                        </div>
                        <div class="col-md-3">
    
                          <span style="font-weight: bold; font-size:16px">Fecha Donacion:</span>  {{$donante->fecha_donacion}}
                        </div>
                      </div>
                      <div class="d-flex mb-5">
                        <div class="col-md-3">
                          <span style="font-weight: bold; font-size:16px">Tipo Donacion : </span>{{$donante->tipo_donacion}}
                        </div>
                        <div class="col-md-3">
                          <span style="font-weight: bold; font-size:16px">Nombre del Paciente: </span>{{$donante->nombre_paciente}}
                        </div>
                    </div>
                  @if ($serologico)

                    <h4 style="display:flex; justify-content:center;margin-bottom:3em"><strong>Datos Sereologicos :</strong> {{$serologico->fecha}}</h4>
                    <div class="container">
                      <div class="d-flex mb-5">
                        <div class="col-md-3">
                          <span style="font-weight: bold; font-size:16px">Peso (P):	</span>{{$serologico->peso}}
                        </div>
                        <div class="col-md-3">
                          <span style="font-weight: bold; font-size:16px">Hematocrito ( HB/HC): </span>{{$serologico->hematocrito}}
                        </div>
                        <div class="col-md-3">
                          <span style="font-weight: bold; font-size:16px">Tensión Arterial (TA):</span> {{$serologico->tension}}
                        </div>
                        <div class="col-md-3">
    
                          <span style="font-weight: bold; font-size:16px">Pulso:</span>  {{$serologico->pulso}}
                        </div>
                      </div>
                      <div class="d-flex mb-5">
                        <div class="col-md-3">
                          <span style="font-weight: bold; font-size:16px">Temperatura:  </span>{{$serologico->temperatura}}
                        </div>
                        <div class="col-md-4">
                          <span style="font-weight: bold; font-size:16px">Responsable de la  Selección:  </span> {{$serologico->user->name}} {{$serologico->user->apellidos}}
                        </div>
                      
                      </div>
                  
                    </div>
                
                  @endif
                  @if ($pruebas)

                    <h4 style="display:flex; justify-content:center;margin-bottom:2em"> <strong>Resultado de Pruebas :</strong> {{$pruebas[0]->fecha}}</h4>
                    <div class="container">
                      @foreach ($pruebas as $item)
                                                          
                          <li class="list-group-item"> 
                              <label style="font-weight:bold">{{$item->prueba->descripcion}} : </label> 

                                {{$item->respuesta}}
                          </li>
                      @endforeach
                    </div>
                
                  @endif

                @endif

              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection


