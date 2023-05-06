
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
                <h5 class="font-weight-bold">Listado de Serologico</h5>
                <a href="{{route('donante.serologico',$id)}}" class="btn btn-success mb-3">CREAR</a>
              </div>
              @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{Session::get('message')}}!</strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>                
                </div>
              @endif
              <div class="x_content table-responsive">
                <table class="table table-striped table-bordered" id="products">
                  <thead class="thead-dark">
                    <tr>
                      <th>Id</th>
                      <th>Fecha</th>
                      <th>Donante</th>
                      <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($userSerologico as $item)
                    <tr>
                    
                      <td>{{$item->id}}</td>
                      <td>{{$item->fecha}}</td>
                      <td>{{$item->donante->nombres}} {{ $item->donante->apellidos}}</td>
                   
                      <td>
                        <div class="d-flex justify-content-around">
                            <a href="{{route('donante.show.serologico',[$item->id, $item->donante_id])}}" class="btn btn-warning"><i class="fa fa-file" aria-hidden="true"></i></a> 
                        </div>
                      </td>
                    </tr>                        
                    
                    @empty
                      <tr>
                        <td colspan="9">
                          <p>No hay registros actualmente</p>
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>          
              </div>     
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
        
 
@endsection
