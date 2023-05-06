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
                            <h5  class="font-weight-bold text-center">Serologico del Donanate : {{$donante->nombres}} {{$donante->apellidos}} <br>Fecha: {{$serologico->fecha}}</h5>
                            <div class="box-body" style="">
                              <div class="row">
                                  <div class="container">
                
                                    <div class="row">
                                      <div class="col-md-4">

                                          <div class="form-group">
                                              <label>Peso (p)</label>
                                              <input type="text" class="form-control" name="peso" value="{{$serologico->peso}}" disabled>
                                          </div>
                                          <div class="form-group">
                                              <label>Pulso</label>
                                              <input type="text" class="form-control" name="pulso" value="{{$serologico->pulso}}" disabled>
                                          </div>


                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label>Hematocrito ( HB/HC):</label>
                                              <input type="text" class="form-control" name="hematocrito" value="{{$serologico->hematocrito}}" disabled>
                                          </div>
                                          <div class="form-group">
                                              <label>Temperatura</label>
                                              <input type="text" class="form-control" name="temperatura" value="{{$serologico->temperatura}}" disabled>
                                          </div>
                                        
                                      
                                        
                                      </div>
                                      <div class="col-md-4">
                                          
                                          <div class="form-group">
                                              <label>Tensión Arterial (TA):</label>
                                              <input type="text" class="form-control" name="tension" value="{{$serologico->tension}}" disabled>
                                          </div>
                                          <div class="form-group">
                                            <label>Responsable</label>
                                            <input type="text" class="form-control" name="responsable" value="{{$serologico->user->name}} {{$serologico->user->apellidos}}" disabled>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">

                                    <h4 style="display:flex;justify-content:center;margin-top:2em;font-weight:bold;margin-bottom:2em;">Aprobacion</h4>
                                    @if ($donante)
                                      @if (!$aprobacionTrue)
                                          
                                      
                                      <div class="container">
                        
                                        <form action="{{ route('aprobacion.store') }}" method="POST">
                                          @csrf
                                          <div class="row">
                                              <div class="col-md-4">
                        
                                                <div class="form-group">
                                                    <label>Tipo de Donacion</label>
                                                    <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="tipo_donacion">
                                                      <option value="{{ $donante->tipo_donacion }}">{{ $donante->tipo_donacion }}
                                                      <option>--------------</option>
                                                      <option value="Voluntaria">Voluntaria</option>
                                                      <option value="Dirigida a Paciente">Dirigida a Paciente</option>
                                                      <option value="Auto Donación">Auto Donación</option>
                                                    </select>
                                                </div>
                                                
                        
                                                    <div class="form-group">
                                                      <label>En caso de reacción descríbala:
                                                      </label>
                                                      <textarea name="reaccion" rows="5" cols="5" class="form-control"> </textarea>
                                                
                                                  </div>
                                              </div>
                        
                                              <input type="hidden" name="donante" value="{{$donante->id}}">
                                              <input type="hidden" name="serologico" value="{{$code}}">
                                              <div class="col-md-4">
                        
                                                  <div class="form-group">
                                                      <label>Responsable de la extraccion</label>
                                                      <input type="text" class="form-control" name="responsable_extraccion" required>
                                                  </div>
                                                  <div class="form-group">
                                                      <label>En caso de que el donante sea descartado o diferido,  señalar la causa
                                                      </label>
                                                      <textarea name="descartado_diferido" rows="5" cols="5" class="form-control"> </textarea>
                                                
                                                  </div>
                        
                                              </div>
                                            
                        
                                          </div>
                                          <button type="submit" class="btn btn-success">Guardar</button>
                                        </form>
                                          
                                      </div>

                                      @else

                                          <div class="col-md-4">
                            
                                            <div class="form-group">
                                                <label>Tipo de Donacion</label>
                                                <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="tipo_donacion" disabled>
                                                  <option value="{{ $donante->tipo_donacion }}">{{ $donante->tipo_donacion }}
                                            
                                                </select>
                                            </div>
                                            
                    
                                                <div class="form-group">
                                                  <label>En caso de reacción descríbala:
                                                  </label>
                                                  <textarea name="reaccion" rows="5" cols="5" class="form-control" disabled> {{$aprobacion->reaccion}}</textarea>
                                            
                                              </div>
                                          </div>
                    
                                        
                                          <div class="col-md-4">
                    
                                              <div class="form-group">
                                                  <label>Responsable de la extraccion</label>
                                                  <input type="text" class="form-control" name="responsable_extraccion" value="{{$aprobacion->responsable_extraccion}}" disabled>
                                              </div>
                                              <div class="form-group">
                                                  <label>En caso de que el donante sea descartado o diferido,  señalar la causa
                                                  </label>
                                                  <textarea name="descartado_diferido" rows="5" cols="5" class="form-control" disabled>{{$aprobacion->descartado_diferido}}</textarea>
                                            
                                              </div>
                    
                                          </div>
                                        
                                      @endif

                                    @endif
                    
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

