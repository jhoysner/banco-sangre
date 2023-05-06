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
                          <h5  class="font-weight-bold text-center">Historia del Donanate : {{$donante->nombres}}  {{$donante->apellidos}}</h5>
                            <div class="box-body" style="">
                                <div class="row">
                                  <div class="container">
                                      
                                    <div class="row">
                                    <form action="{{ route('donante.historia.store', $donante->id) }}" method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                          <div class="card" >
                                              <ul class="list-group list-group-flush">
                                                @foreach ($preguntas as $item)
                                                        
                                                    <li class="list-group-item"> 
                                                        <label style="font-weight:bold">{{$item->descripcion}} : </label> 

                                                        <div class="form-check form-check-inline ">
                                                        <input class="" type="radio" name="{{$item->id}}" value="si"  required="required">
                                                            <label class="form-check-label" for="inlineRadio1">Si</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="" type="radio" name="{{$item->id}}"  value="no"  required="required">
                                                            <label class="form-check-label" for="inlineRadio2">No</label>
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

