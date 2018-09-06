@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card text-white bg-primary">
                <div class="card-header">{{ __('Inicia Sesión') }}</div>

                <div class="card-body">
                    <div id="userAS" xmlns:v-bind="http://www.w3.org/1999/xhtml" xmlns:v-bind="http://www.w3.org/1999/xhtml">
                        <form method="POST" v-on:submit.prevent="login()" xmlns:v-on="http://www.w3.org/1999/xhtml"
                              xmlns:v-bind="http://symfony.com/schema/routing">

                            <ul class="card-actions icons right-top">
                                <a  data-dismiss="modal"  class="text-white" aria-label="Close">
                                    <i class="zmdi zmdi-close"></i>
                                </a>
                            </ul>

                            <div v-if="Object.keys(errors).length > 0 " class="alert bg-danger" role="alert">
                                <div v-for="error in errors">
                                    <span class="label label-danger">@{{ error[0]}}</span>
                                </div>
                            </div>
                            <div class="form-group is-empty">
                                <label class="control-label">Documento</label>
                                <div>
                                    <input type="text"  name="username"
                                           id="username"  class="form-control" v-model="username" placeholder="Número de documento">
                                </div>
                            </div>
                            <div class="form-group is-empty">
                                <label class="control-label">Contraseña</label>s
                                <div >
                                    <input type="password"  name="password"
                                           id="password"  class="form-control" v-model="password" placeholder="Contraseña">
                                </div>
                            </div>
                            <div >
                                <input type="submit"  class="btn btn-secondary" :disabled="isDisabled"
                                       v-bind:value="btnmessage">
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
