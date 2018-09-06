<template>
    <div class="container">
        <div class="row">

            <div v-if="asistencias == null">
                <h5>No hay asistencias aún</h5>
            </div>
            <div class="col-md-8" v-if="asistencias != null">
                <div class="row">
                <div class="col-md-4">
                    <!--<h3>{{asistencia.estudiante.user.name}}</h3>-->

                </div>
                <div class="col-md-4">
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <router-link to="/docent/assist" class="btn btn-success" style="color: white">
                        Volver
                    </router-link>
                        <router-link to="/docent/assist" class="btn btn-warning " style="color: black" disabled>
                            Editar(no disponible)
                        </router-link>
                    </div>
                </div>
                </div>
                       <!-- <div class="jumbotron">
                            <h1 class="mb-4">{{oferta.name}}</h1>

                        </div>-->
                
                <!--<p >{{oferta.description}}</p>-->
                
                <div class="card mb-4">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-5">
                                <h3 class="card-title">Asistencia a clase</h3>
                            </div><div class="col-md-2">
                            <button class="btn btn-primary btn-circle margin" type="button"><span class="fa fa-plus"></span></button>
                            </div>
                        </div>

                        <div class="dropdown card-title-btn-container">
                            <button class="btn btn-sm btn-subtle" type="button"><em class="fa fa-list-ul"></em> View All</button>
                            <button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>
                        </div>

                        
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>observación</th>
                                        <th>Fecha</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="asistencia in asistencias">
                                        <td v-show="asistencia.tipo_asistencia == 1">asistió</td>
                                        <td v-show="asistencia.tipo_asistencia == 2">No Asistió</td>
                                        <td v-show="asistencia.tipo_asistencia == 3">Asistió tarde</td>
                                        <td v-show="asistencia.tipo_asistencia == 4">Permiso médico</td>
                                        <td v-show="asistencia.tipo_asistencia == 5">Otra</td>
                                        <td v-show="asistencia.tipo_asistencia == null || asistencia.tipo_asistencia > 5">{{asistencia.tipo_asistencia}}</td>
                                        <td>{{asistencia.observacion_asistencia}}</td>
                                        <td>{{asistencia.fecha_asistencia}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4" ><!--MENU DERECHA-->
                
            </div>
        </div>
    </div>
</template>
<script>
    
    export default{
        data(){
            return{
                id:null,
                asistencias:null
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
            this.getAsistencia;
        },
        methods:{
            setData(res){
            console.log('aqui va',res)
                this.id = res.id;
                this.getAsistencia();
            },
            getAsistencia(){
                let url =`/api/asistencia/${this.id}`;
                axios.get(url).then(response => {
                    console.log("respuesta:", response);
                    this.asistencias = response.data.results;
                    
                }).catch(error => {
                    console.log("Ocurrio un error");
                    //this.errors = error.response.data.errors;
                });
            },

        }
    }
</script>
