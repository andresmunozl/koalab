@extends('layouts.app')

@section('content')
<div> <h2>Asitencia</h2> </div>
<div class="row">
    
    <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <a href="http://127.0.0.1:8000/lista#/" class="btn btn-primary "
                            >Llamar Asistencia</a>
        </div>
        <div class="col-sm-1"></br></div>
</div>
<div class="row">
    
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <form method="Post" action="" v-on:submit.prevent="getAsistencia(1)">

            {{ csrf_field() }}
            <h5 class="modal-title" id="exampleModalLabel">Buscar estudiante por id</h5>
                              
            <div class="form-group row">
            <label for="id" class="col-md-4 col-form-label text-md-right">Id</label>
                              
            <div class="col-md-6">
                <input id="id" type="text" class="form-control" name="id" >
            </div>
            </div>
    
            
                              
            <div class="form-group btn btn-primary">
                <button type="submit" class="btn btn-primary">Buscar</button>
             </div>
        </form>
    </div>
    <div class="col-sm-1"></div>
</div>
                          

@endsection