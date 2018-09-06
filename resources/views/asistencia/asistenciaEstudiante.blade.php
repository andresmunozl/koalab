@extends('layouts.app')

@section('content')
    
    <div id="crudAsistencia" class="row col-centered" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
                <h5 class="modal-title">Lista de Asistencia</h5>
                <table class="table table-hover table-sprite" class="col-md-6">
                  <thead>
                    <tr>
                      <th scope="col">Nombre estudiante</th>
                      <th scope="col">Apellido estudiante</th>
                      <th scope="col">asistencia tipo</th>
                      <th scope="col">asistencia_observacion</th>
                      <th scope="col">acción</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="item in asistencia">
                    <th scope="row">@{{item.estudiante.user.name}}</th>
                      <td> @{{item.estudiante.user.lastname}}</td>
                      <td>@{{item.tipo_asistencia}}</td>
                      <td> @{{item.observacion_asistencia}}</td>
      
                      <td>
                        
                      </td>
                    </tr>
                    
                  </tbody>
                </table>
        </div>
        <div class="col-lg-1"></div>
    </div>
@endsection