
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
            
                <h5 class="font-weight-bold">Pruebas</h5>

                <form action="{{ route('pruebas.index') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4" style="display: flex;
                        justify-content: center;
                        align-items: center;">
                            

                        <input type="text" class="form-control" name="cedula" placeholder="cedula" required>
                        <button type="submit" class="btn btn-info ml-4" >Buscar</button>
                           

                    </div>
                </form>
              </div>

              <br><br>
              <div class="row">
                @if ($donante)
                <div class="container">
                  <div class="row">
                    <div class="co-md-4"></div>
                  </div>
                  <div class="d-flex mb-5">
                    <div class="col-md-4">
                      <h4>Serial : </h4>{{$donante->serial}}
                    </div>
                    <div class="col-md-4">
                      <h4>Nombres: </h4> {{$donante->nombres}}
                    </div>
                    <div class="col-md-4">

                      <h4>Apellidos:</h4>  {{$donante->apellidos}}
                    </div>
                  </div>
                  <div class="row">
                    <form action="{{ route('pruebas.store', $donante->id) }}" method="POST">
                        @csrf
                        <div class="col-md-12">
                          <div class="card" >
                              <ul class="list-group list-group-flush">
                                @foreach ($preguntas as $item)
                                        
                                    <li class="list-group-item"> 
                                        <label style="font-weight:bold">{{$item->descripcion}} : </label> 

                                        <div class="form-check form-check-inline ">
                                        <input class="" type="radio" name="{{$item->id}}" value="Reactivo"  required="required">
                                            <label class="form-check-label" for="inlineRadio1">Reactivo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="" type="radio" name="{{$item->id}}"  value="Negativo"  required="required">
                                            <label class="form-check-label" for="inlineRadio2">Negativo</label>
                                        </div>
                                    </li>
                                @endforeach
        
                              
                              </ul>
                          
                          </div>
                        </div>
                            <div style="display: flex;justify-content: end">
                                <button type="submit" class="btn btn-success mt-5">Crear</button>
                            </div>
                        </form>
                            
                    </div>
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


