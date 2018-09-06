<template xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="row">
                <div class="col-md-4">
                    <h3 v-if="materia!=null">{{materia.name}}</h3>

                </div>
                <div class="col-md-4">
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <button class="btn btn-success" v-on:click="back()" style="color: white">
                        Volver
                    </button>
                    </div>
                </div>
                </div>
                <div class="divider"></div>
                <p v-if="materia != null" >{{materia.descripcion}}</p>
                <div class="card mb-4">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-5">
                                <h3 class="card-title">Planes de clase</h3>
                            </div><div class="col-md-2">
                            <button class="btn btn-primary btn-circle margin" type="button" v-on:click="createP()"><span class="fa fa-plus"></span></button>
                            </div>
                        </div>

                        <div class="dropdown card-title-btn-container">
                            <button class="btn btn-sm btn-subtle" type="button"><em class="fa fa-list-ul"></em> View All</button>
                            <button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>
                            <!--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#"><em class="fa fa-search mr-1"></em> More info</a>
                                <a class="dropdown-item" href="#"><em class="fa fa-thumb-tack mr-1"></em> Pin Window</a>
                                <a class="dropdown-item" href="#"><em class="fa fa-remove mr-1"></em> Close Window</a></div>-->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Desde</th>
                                    <th>Hasta</th>
                                    <th>Cant Horas</th>
                                    <th>Cant Sesiones</th>
                                    <th>Ops</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in planeadors">
                                    <td>{{item.fecha_inicio}}</td>
                                    <td>{{item.fecha_fin}}</td>
                                    <td>{{item.horas}}</td>
                                    <td>{{item.sesiones}}</td>
                                    <td> <button class="btn btn-info" style="color: white">
                                        Ver
                                    </button>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <h3 v-if="planeadors!= null && planeadors.length ===0">No hay registros</h3>
                        </div>
                    </div>
                </div>
            </div>
           <!-- <div class="col-md-4" >&lt;!&ndash;MENU DERECHA&ndash;&gt;
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
                            <h2> No Hay</h2>
                    </div>
                </div>
            </div>-->
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
                planeadors:[],
                materia:null
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
            //alert(this.id);
        },
        methods:{
            setData(res){
            console.log('holssssa2',res)
                this.id = res.id;
                this.getOfert();
            },
            getOfert(){
                let url =`/api/doc/ofertac/${this.id}`;
                    axios.get(url).then(response => {
                    console.log("respuesta:", response);
                    this.materia = response.data.materia;
                    this.planeadors = response.data.results;

                }).catch(error => {
                    console.log("Ocurrio un error");
                  //  this.errors = error.response.data.errors;
                });
            },
            createP(){
                    this.$router.push({path:`/docent/planeador/create/${this.id }` ,params:{ id: 1234 }});
            },
            back(){
                this.$router.back();
            }


        }
    }
</script>
