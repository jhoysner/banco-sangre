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
                            
                          <a href="{{route('donante.serologico.historial', $donante->id)}}" class="btn btn-info mb-4">atras</a>
                          <h5  class="font-weight-bold text-center">Serologicos del Donanate : {{$donante->nombres}}  {{$donante->apellidos}}</h5>
                            <div class="box-body" style="">
                                <div class="row">
                                  <div class="container">
                                      
                                    <div class="row">
                                        <form action="{{ route('donante.serologico.store', $donante->id) }}" method="POST">
                                            @csrf
                                          <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <label>Peso (p)</label>
                                                    <input type="text" class="form-control" name="peso" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pulso</label>
                                                    <input type="text" class="form-control" name="pulso" required>
                                                </div>
                                              

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Hematocrito ( HB/HC):</label>
                                                    <input type="text" class="form-control" name="hematocrito" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Temperatura</label>
                                                    <input type="text" class="form-control" name="temperatura" required>
                                                </div>
                                              
                                            </div>
                                            <div class="col-md-4">
                                                
                                                <div class="form-group">
                                                    <label>Tensión Arterial (TA):</label>
                                                    <input type="text" class="form-control" name="tension" required>
                                                </div>
                                              
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

