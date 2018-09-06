<template>
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="row">
                <div class="col-md-4">
                    <!--<h3>{{oferta.name}}</h3>-->

                </div>
                <div class="col-md-4">
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <router-link to="/admin/ofertas" class="btn btn-success" style="color: white">
                        Volver
                    </router-link>
                        <router-link to="/admin/ofertas" class="btn btn-warning " style="color: black" disabled>
                            Editar
                        </router-link>
                    </div>
                </div>
                </div>
                       <!-- <div class="jumbotron">
                            <h1 class="mb-4">{{oferta.name}}</h1>

                        </div>-->
                <div class="divider"></div>
                <!--<p >{{oferta.description}}</p>-->
                <div class="card mb-4">
                    <div class="card-block">
                        <div v-if="!create"  class="row">
                            <div class="col-md-5">
                                <h4 class="card-title">Materias Del Grupo</h4>
                            </div><div class="col-md-2">
                            <button class="btn btn-primary btn-circle margin" type="button" v-on:click="createM()"><span class="fa fa-plus"></span></button>
                            </div>
                        </div>

                        <div v-if="!create" class="dropdown card-title-btn-container">
                            <button class="btn btn-sm btn-subtle" type="button"><em class="fa fa-list-ul"></em> View All</button>
                            <button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>
                            <!--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#"><em class="fa fa-search mr-1"></em> More info</a>
                                <a class="dropdown-item" href="#"><em class="fa fa-thumb-tack mr-1"></em> Pin Window</a>
                                <a class="dropdown-item" href="#"><em class="fa fa-remove mr-1"></em> Close Window</a></div>-->
                        </div>
                        <div v-if="!create" class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Materia</th>
                                    <th>Docente</th>
                                    <th>Ops</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in materiaoferta">
                                    <td>{{item.materia.name}}</td>
                                    <td>
                                        <div v-if="item.docente !== null">
                                            {{item.docente.user.name}} {{item.docente.user.lastname}}
                                        </div>
                                    </td>
                                    <td> <button class="btn btn-info" style="color: white">
                                        Ver
                                    </button>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <div v-if="materiaoferta.length == 0">
                                <h4>No hay Registros</h4>
                            </div>
                        </div>
                        <div v-if="create">
                            <h3>Nueva materia a la oferta</h3>
                            <br>
                            <div class="card-block">
                                <div v-if="Object.keys(errors).length > 0 " class="alert bg-danger" role="alert">
                                    <div v-for="error in errors">
                                        <span class="label label-danger">{{ error[0]}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Materia</label>
                                    <div class="col-md-9">
                                        <select class="custom-select form-control" v-model="materiaO.materia_id">
                                            <option v-for="item in materias" v-bind:value="item.materia_id">{{item.name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Docente</label>
                                    <div class="col-md-9">
                                        <select class="custom-select form-control" v-model="materiaO.docente_id">
                                            <option v-for="item in docentes" v-bind:value="item.id">{{item.user.name}} {{item.user.lastname}}</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-lg btn-success" v-bind:class="{disabled: saving}" v-on:click="saveOfertaMateria()">Registrar</button>
                                <button type="button" class="btn btn-lg btn-warning" v-on:click="create=false">Cancelar</button>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" ><!--MENU DERECHA-->
                <div class="card-block">
                    <h3 class="card-title">Grupo: {{oferta.grupo.name}} {{oferta.grupo.ext}}</h3>
                    <h6 class="card-subtitle mb-2 ">Estudiantes Matriculados <b>({{students.length}})</b></h6>

                    <div v-if="students.length >0">
                    <div v-for="item in students" class="user-progress justify-center">
                        <div class="col-sm-3 col-md-2" style="padding: 0;">
                            <img src="assets/img/logo.png" alt="profile photo" class="circle profile-photo" style="width: 100%; max-width: 100px;">
                        </div>
                        <div class="col-sm-9 col-md-10">
                            <h6 class="pt-1">{{item.student.user.name }} {{item.student.user.lastname }}</h6>
                            <div class="progress progress-custom">
                                <div class="progress-bar bg-primary" style="width: 100%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                        <div class="divider"></div>
                    </div>
                    <div v-if="students.length === 0">
                        <br>
                            <h2>No hay</h2>
                    </div>
                </div>
            </div>

        </div>
    </div>


</template>
<script>
    import DatePicker from 'vue2-datepicker'
    import { FulfillingSquareSpinner } from 'epic-spinners'
    export default{
        components: { DatePicker ,
            FulfillingSquareSpinner
        },
        data(){
            return{
                id:null,
                planeador:null,
                create:false,
                errors:[],
                finish:false,
                saving:false,
            }
        },
        beforeRouteEnter(to, from , next){
            next(vm => vm.setData(to.params))
        },
        beforeRouteUpdate(to, from , next){
            this.setData(to.query);
            next()
        },
        created(){
        },
        methods:{
            setData(res){
            console.log('setData planeador',res)
                this.id = res.id;
                this.planeador.id = res.id;
                this.getPlaneador();
            },
            getPlaneador(){
                this.planeador.id = this.id;
                let url =`/api/planeador/${this.id}`;
                axios.get(url).then(response => {
                    console.log("respuesta:", response);
                    this.planeador = response.data.results;
                }).catch(error => {
                    console.log("Ocurrio un error en get Planeador");
                  //  this.errors = error.response.data.errors;
                });
            },
            createM(){
                this.errors=[];
                this.materiaO={
                    id:0,
                    oferta_id:this.id,
                        materia_id:null,
                        docente_id:null,
                };
                this.create = true;
            },
            saveOfertaMateria(){
                this.errors = [];
                this.saving = true;
                let url = '/api/ofertamateria';
                axios.post(url,this.materiaO).then(response => {
                    console.log('ok');
                    this.errors = [];
                    this.create = false;
                    this.errors=[];
                    this.materiaO={
                        id:0,
                        oferta_id:this.id,
                        materia_id:null,
                        docente_id:null,
                    };
                    this.getOfert();
                }).catch(error => {
                    console.log('error', error);
                    this.errors = error.response.data.errors;
                    this.saving = false;
                });
            }
        }
    }
</script>
