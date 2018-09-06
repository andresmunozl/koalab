<template>
    <div class="container">
            <!-- inicia -->
            <div class="card-block">
                        <div v-if="matriculas != null"  class="row">
                            <div class="col-md-5">
                                <h4 class="card-title">Estudiantes</h4>
                            </div><div class="col-md-2">
                            <!-- <button class="btn btn-primary btn-circle margin" type="button" v-on:click="createM()"><span class="fa fa-plus"></span></button> -->
                            </div>
                        </div>

                        <div v-if="matriculas != null" class="dropdown card-title-btn-container">
                            <button class="btn btn-sm btn-subtle" type="button"><em class="fa fa-list-ul"></em> View All</button>
                            <button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>
                            <!--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#"><em class="fa fa-search mr-1"></em> More info</a>
                                <a class="dropdown-item" href="#"><em class="fa fa-thumb-tack mr-1"></em> Pin Window</a>
                                <a class="dropdown-item" href="#"><em class="fa fa-remove mr-1"></em> Close Window</a></div>-->
                        </div>
                        <div v-if="matriculas != null" class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col" class="d-none d-md-block">Correo</th>
                                    <th scope="col">Asistencia</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in matriculas">
                                    <td>{{item.student.id}}</td>
                                    <td>{{ item.student.user.name}} {{ item.student.user.lastname}}</td>
                                    <td class="d-none d-md-block">{{ item.student.user.email  | maxtd}}</td>
                                    <td>
                                        <button  v-on:click="showAsistEst(item.student.id)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
                                            </span> &nbsp;Ver Asistencia
                                        </button>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <div v-if="matriculas.length == 0">
                                <h4>No hay Registros</h4>
                                <router-link to="/docent/assistmenu" class="btn btn-success" data-dismiss="modal" style="color: white">
                                    volver
                                </router-link>
                            </div>
                        </div>
                        
                    </div>
            <!-- termina -->
               
    </div>
</template>
<script>

    export default{
        data(){
            return{
                id:null,
                estudiantes:null,
                matriculas:[],
                errors:[]
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
            console.log('aqui va llamar lista',res)
                this.id = res.id;
                this.getEstudiantes();
            },
            getEstudiantes(){
                var url = `/api/matricula/${this.id}`;
                axios.get(url).then(response => {
                    // alert(this.matriculas.length);
                    for(var i=0; i<response.data.results.length ; i++){
                        let matri = response.data.results[i];
                        this.matriculas.push(matri);
                    }
                    // alert(this.matriculas.length);
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            showAsistEst(item){
                this.$router.push({path:`/docent/assist/${this.id}/${item}` ,params:{ id: 1234 }});

            }
        }
    }
</script>