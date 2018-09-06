@extends('layouts.app')

@section('content')


  
  <div id="crudMateria" class="row">
      <div>
          <button type="button" class="btn btn-primary" data-toggle="modal"  v-on:click.prevent="showCreate()">
              Agregar Materia
          </button>
      </div>
      
      <div class="col-sm-12">
          
          <table class="table table-hover table-sprite">
              <thead>
                <tr>
                  <th scope="col">Materia id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">año id</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in materias">
                <th scope="row"> @{{item.materia_id}}</th>
                  <td> @{{item.name}}</td>
                  <td>@{{item.description}}</td>
                  <td>@{{item.anio_id}}</td>
                </tr>
                
              </tbody>
            </table>
      </div>
      
  </div>
  @include('materia.create')
  
@endsection