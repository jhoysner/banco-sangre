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
                <div class="box-body" style="">
                    <div class="row">
                        <div class="container">
                            
                            <a href="{{route('donante.historia.historial', $donante->id)}}" class="btn btn-info mb-4">atras</a>
                            <h5  class="font-weight-bold text-center">Historia del Donanate : {{$donante->nombres}} {{$donante->apellidos}} <br>Fecha: {{$fecha}}</h5>
                            <div class="box-body" style="">
                                <div class="row">
                                  <div class="container">
                
                                    <div class="row">
                                        <div class="card" >
                                            <ul class="list-group list-group-flush">
                                              @foreach ($respuestas as $item)
                                                      
                                                  <li class="list-group-item"> 
                                                      <label style="font-weight:bold">{{$item->pregunta->descripcion}} : </label> 

                                                        {{$item->respuesta}}
                                                  </li>
                                              @endforeach
                      
                                            
                                            </ul>

                                    </div>
                                </div>

                              </div>
                      
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

