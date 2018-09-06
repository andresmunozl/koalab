<template>
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <h3>2018 - {{oferta.oferta.code}}</h3>

                    </div>
                    <!--<div class="col-md-4">
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
                        <div  class="row">
                            <div class="col-md-5">
                                <h4 class="card-title">Materias</h4>
                            </div><div class="col-md-2">
                            <!--<button class="btn btn-primary btn-circle margin" type="button" v-on:click="createM()"><span class="fa fa-plus"></span></button>-->
                        </div>
                        </div>
                        <div  class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Materia</th>
                                    <th>Docente</th>
                                    <th>Ops</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in oferta.materias">
                                    <td>{{item.materia.name}}</td>
                                    <td>{{item.docente.user.name}} {{item.docente.user.lastname}}</td>
                                    <td>
                                        <button class="btn btn-info" style="color: white" v-on:click="showO(item.id)">
                                        Ver
                                    </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div v-if="oferta.materias != null && oferta.materias.length == 0">
                                <h4>No hay materias aún, coodinación se encuantra gestionando</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4" ><!--MENU DERECHA-->
                <div class="card-block">
                        <h3 class="card-title">Grupo: {{oferta.oferta.grupo.name}} {{oferta.oferta.grupo.ext}}</h3>
                    <h6 class="card-subtitle mb-2 ">Director De grupo <b>{{oferta.oferta.director.user.name}} {{oferta.oferta.director.user.lastname}}</b></h6>

                    <!--<div v-if="students.length >0">-->
                        <!--<div v-for="item in students" class="user-progress justify-center">-->
                            <!--<div class="col-sm-3 col-md-2" style="padding: 0;">-->
                                <!--<img src="assets/img/logo.png" alt="profile photo" class="circle profile-photo" style="width: 100%; max-width: 100px;">-->
                            <!--</div>-->
                            <!--<div class="col-sm-9 col-md-10">-->
                                <!--<h6 class="pt-1">{{item.student.user.name }} {{item.student.user.lastname }}</h6>-->
                                <!--<div class="progress progress-custom">-->
                                    <!--<div class="progress-bar bg-primary" style="width: 100%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                        <!--<div class="divider"></div>-->
                    <!--</div>-->
                    <!--<div v-if="students.length === 0">-->
                        <!--<br>-->
                        <!--<h2> No Hay</h2>-->
                    <!--</div>-->
                </div>
            </div>

        </div>
    </div>


</template>
<script>

    export default{
        data(){
            return{
                oferta:null,
                url:'/api/student/clases',
                errors:[]
            }
        },
        created(){
            this.getOfertas();
        },
        methods:{
            getOfertas(){
                axios.get(this.url).then(response => {
                    console.log("respuesta:", response);
                    if(response.data.results === null){
                        this.$router.push({path:`/student/matriculate`});
                    }
                    else {
                        console.log('no es nulo');
                        this.oferta = response.data.results;
                    }
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            showO(item){
                this.$router.push({path:`/student/clases/${item}` ,params:{ id: item }});
            },
            openM(item){

            }
        }
    }
</script>