@extends('layouts.app')

@section('content')

    
    <div id="crudAsistencia" class="row col-centered" xmlns:v-on="http://www.w3.org/1999/xhtml">
      
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
                <h5 class="modal-title" id="exampleModalLabel">Lista de Asistencia</h5>
                <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apelido</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Asistencia</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="item in estudiantes">
                          <th scope="row"> @{{item.id}}</th>
                            <td> @{{ item.user.name}}</td>
                            <td>@{{ item.user.lastname}}</td>
                            <td>@{{ item.user.email}}</td>
                              <td>
                                <div class="row">
                                    <div class="col-sm-6">
                                            <textarea class="form-control" name="observacion_asistencia" rows="1" cols="15" placeholder="Observación"></textarea>
                                    </div>
                                    <div class="col-sm-6">
                                            <select  name="tipo_asistencia" class="custom-select form-control"  v-model="item.asist.tipo_asistencia" required><!---->
                                                <option  value="1">Asistió</option>
                                                <option value="2">No Asistió</option>
                                                <option value="3">Asistió tarde</option>
                                                <option value="4">Permiso médico</option>
                                                <option value="5">Otra</option>
                                            </select>
                                    </div>
                                </div>
                              </td>
                          </tr>
            
            
                        </tbody>
                      </table>
                    <div class="btn btn-primary" v-on:click="saveList()">
                        Guardar Llamado
                    </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
@endsection