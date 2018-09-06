@extends('layouts.app')

@section('content')
    <div id="crudEstudiantes" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <button type="button" class="btn btn-primary"  v-on:click.prevent="showCreate()">
            Crear Estudiante
        </button>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apelido</th>
                <th scope="col">Correo</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in estudiantes">
              <th scope="row"> @{{item.id}}</th>
                <td> @{{ item.user.name}}</td>
                <td>@{{ item.user.lastname}}</td>
                <td>@{{ item.user.email}}</td>
                  <td width="10px">
                      <a href="#" class="btn btn-warning "
                         v-on:click.prevent="editUser(item)">Editar</a>
                  </td>
              </tr>
              
            </tbody>
          </table>
        @include('estudiante.create')
        @include('estudiante.edit')
        @include('estudiante.delete')
    </div>
@endsection