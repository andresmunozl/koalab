<template>
    <div class="container">
        <!-- inicia -->
            <div class="card-block">
                        <div v-if="items != null"  class="row">
                            <div class="col-md-5">
                                <h4 class="card-title">Estudiantes</h4>
                            </div><div class="col-md-2">
                            <!-- <button class="btn btn-primary btn-circle margin" type="button" v-on:click="createM()"><span class="fa fa-plus"></span></button> -->
                            </div>
                        </div>

                        <div v-if="items != null" class="dropdown card-title-btn-container">
                            <button class="btn btn-sm btn-subtle" type="button"><em class="fa fa-list-ul"></em> View All</button>
                            <button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>
                            <!--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#"><em class="fa fa-search mr-1"></em> More info</a>
                                <a class="dropdown-item" href="#"><em class="fa fa-thumb-tack mr-1"></em> Pin Window</a>
                                <a class="dropdown-item" href="#"><em class="fa fa-remove mr-1"></em> Close Window</a></div>-->
                        </div>
                        <div v-if="items != null" class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col" class="d-none d-md-block">Correo</th>
                                    <th scope="col">Evaluación</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in items">
                                    <td>{{item.estudiante_id}}</td>
                                    <td></td>
                                    <td class="d-none d-md-block"></td>
                                    <td>
                                        <div class="row">
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="number" min="0" max="5" name="placeholder" placeholder="nota" v-model="items.nota">                                                        
                                                </div>
                                                
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <div v-if="items.length > 0">
                                <button  v-on:click="saveList()" class="btn btn-lg btn-success" type="button">Guardar Llamado</button>
                            </div>
                            <div v-if="items.length == 0">
                                <h4>No hay Registros</h4>
                                <router-link to="/docent/evaluate/index" class="btn btn-success" data-dismiss="modal" style="color: white">
                                    volver
                                </router-link>
                            </div>
                        </div>
                        
                    </div>
            <!-- termina -->

            <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">LLamado a lista</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Se evaluó exitosamente!</p>
                        </div>
                        <div class="modal-footer">
                                <router-link to="/docent/assistmenu" class="btn btn-success" data-dismiss="modal" style="color: white">
                                    Aceptar
                                </router-link>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    
</template>
<script>

    export default{
        data(){
            return{
                actividadid:null,
                estudiantes:[],
                items:[],
                evaluaciones:[],
                estudiante:null,
                errors:[],
                evaluacion:{
                    id:0,
                    nombre:'',
                    descripcion:'',
                    estado:0,
                    tenantid:null,
                    estudiante_id:null,
                    actividad_id:this.actividadid
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
            //nada aun
        },
        methods:{

            setData(res){
            console.log('aqui va',res)
                this.actividadid = res.actividadid;
                this.evaluacion.actividadid = this.actividadid;
                this.getItems();
                // alert(this.estandarid);
            },
            getItems(){
                
                let urlid = `/api/evaluacion/${this.actividadid}`;//traiga la tabla de estudiantes de evaluacon con esa actividad
                // alert("aqui va: "+urlid);
                axios.get(urlid).then(response => {
                    console.log("respuesta:", response);
                    // this.items = response.data.results;//datos de evaluacion

                    for(var i=0; i<response.data.results.length ; i++){
                        let evalu = response.data.results[i];


                        this.items.push(evalu);
                    }
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            // getEstMateriaconDoc(){
            //     let url =`/api/matricula/${this.actividadid}`;
            //     axios.get(url).then(response => {

            //         for(var i=0; i<response.data.results.length ; i++){
            //             let matri = response.data.results[i];

            //             let asistencia = { asistencia: {   'programacion_id':0,
            //                                                 'tipo_asistencia':0,
            //                                                  'observacion_asistencia':'',
            //                                                  'fecha_asistencia':''}};
            //             Object.assign(matri,asistencia);

            //             this.matriculas.push(matri);
            //         }
            //     console.log(this.matriculas);
                    
            //     }).catch(error => {
            //         console.log("Ocurrio un error" + error);
            //         //this.errors = error.response.data.errors;
            //     });
            // },
            // saveList: function () {
                
            //     var url = '/api/asistencia';
                
            //     axios.post(url,this.matriculas).then(response => {
            //         this.errors = [];
            //         // alert("guardó!");//al fin lo hizo bien
            //         //lazar modal
            //         $('#create').modal('show');

            //         }).catch(error => {
            //                 this.errors = error.response.data.errors
            //         });

            // },
            
        }
    }
</script>