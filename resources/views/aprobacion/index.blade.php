
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
            
                <h5 class="font-weight-bold">Aprobacion</h5>

                <form action="{{ route('aprobacion.index') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4" style="display: flex;
                        justify-content: center;
                        align-items: center;">
                            

                        <input type="text" class="form-control" name="serial" placeholder="Serial" required>
                        <button type="submit" class="btn btn-info ml-4" >Buscar</button>
                           

                    </div>
                </form>
              </div>

              <br><br>
              <div class="row">
                @if ($donante)
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


