<template>
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <!--<h3>{{oferta.name}}</h3>-->

                    </div>
                  <!--  <div class="col-md-4">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <router-link to="/admin/ofertas" class="btn btn-success" style="color: white">
                                Volver
                            </router-link>
                            <router-link to="/admin/ofertas" class="btn btn-warning " style="color: black" disabled>
                                Editar
                            </router-link>
                        </div>
                    </div>-->
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
                                <h4 class="card-title">Detalle de la materia</h4>
                            </div><div class="col-md-2">
                            <!--<button class="btn btn-primary btn-circle margin" type="button" v-on:click="createM()"><span class="fa fa-plus"></span></button>-->
                        </div>
                        </div>

                        <!--<div v-if="!create" class="dropdown card-title-btn-container">-->
                            <!--<button class="btn btn-sm btn-subtle" type="button"><em class="fa fa-list-ul"></em> View All</button>-->
                            <!--<button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>-->
                            <!--&lt;!&ndash;<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#"><em class="fa fa-search mr-1"></em> More info</a>-->
                                <!--<a class="dropdown-item" href="#"><em class="fa fa-thumb-tack mr-1"></em> Pin Window</a>-->
                                <!--<a class="dropdown-item" href="#"><em class="fa fa-remove mr-1"></em> Close Window</a></div>&ndash;&gt;-->
                        <!--</div>-->
                        <div v-if="!create" class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Actividades</th>
                                    <th>Fecha </th>
                                    <th>Fecha Limite </th>
                                    <th>Ops</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!--<tr v-for="item in materiaoferta">
                                    <td>{{item.materia.name}}</td>
                                    <td>{{item.docente.user.name}} {{item.docente.user.lastname}}</td>
                                    <td> <button class="btn btn-info" style="color: white">
                                        Ver
                                    </button>
                                    </td>
                                </tr>-->

                                </tbody>
                            </table>
                            <div v-if="materiaoferta.length == 0">
                                <h4>No hay Registros</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" ><!--MENU DERECHA-->
                <div class="card-block">
                    <h3 class="card-title">Grupo: </h3>
                    <h6 class="card-subtitle mb-2 ">Estudiantes Matriculados </b></h6>


                        <h2> No Hay</h2>

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
                oferta:null,
                students:[],
                create:false,
                errors:[],
                materias:[],
                finish:false,
                docentes:[],
                materiaoferta:[],
                saving:false,
                materiaO:{
                    id:0,
                    oferta_id:null,
                    materia_id:null,
                    docente_id:null,
                }
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
                console.log('holssssa2',res)
                this.id = res.id;
                this.materiaO.oferta_id = res.id;
                //this.getOfert();
            },
            getOfert(){
                this.materiaO.oferta_id = this.id;
                let url =`/api/oferta/${this.id}`;
                axios.get(url).then(response => {
                    console.log("respuesta:", response);
                    this.oferta = response.data.results;
                    this.students = response.data.matricula;
                    this.materiasOferta = response.data.materiaoferta;
                    this.materias = response.data.materias;
                    this.docentes = response.data.docentes;
                    this.materiaoferta = response.data.materiaoferta;
                }).catch(error => {
                    console.log("Ocurrio un error");
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
