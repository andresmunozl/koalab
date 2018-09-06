@extends('layouts.app')

@section('content')
    <div id="crudProgramacion">
        
        <table class="table">
            <thead>
              <tr>
                <th scope="col">programacion id</th>
                <th scope="col">oferta id</th>
                <th scope="col">materia id</th>
                <th scope="col">docente id</th>
                
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in programacion">
              <th scope="row"> @{{ item.programacion_id}}</th>
                <td> @{{ item.oferta_id}}</td>
                <td>@{{ item.materia_id}}</td>
                <td>@{{ item.docente_id}}</td>
                
              </tr>
              
            </tbody>
          </table>
    </div>
@endsection