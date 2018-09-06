@extends('layouts.app')

@section('content')
    <div id="crudAsistencia"  class="row">
        
        <table class="table table-hover table-sprite" class="col-md-6">
            <thead>
              <tr>
                <th scope="col">estudiante id</th>
                <th scope="col">asistencia fecha</th>
                <th scope="col">programacion id</th>
                <th scope="col">asistencia tipo</th>
                <th scope="col">asistencia_observacion</th>
                <th scope="col">acción</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in asistencia">
              <th scope="row">@{{item.estudiante_id}}</th>
                <td> @{{item.fecha_asistencia}}</td>
                <td>@{{item.programacion_id}}</td>
                <td>@{{item.tipo_asistencia}}</td>
                <td> @{{item.observacion_asistencia}}</td>

                <td>
                  
                </td>
              </tr>
              
            </tbody>
          </table>

          
        
    </div>
@endsection