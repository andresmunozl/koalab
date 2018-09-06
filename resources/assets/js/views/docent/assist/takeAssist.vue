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
                                    <td class="d-none d-md-block">{{ item.student.user.email}}</td>
                                    <td>
                                        <div class="row">
                                                <div class="col-sm-6">
                                                        <textarea class="form-control" name="observacion_asistencia" rows="1" cols="10"  placeholder="Observación" v-model="item.asistencia.observacion_asistencia" required></textarea>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select  name="tipo_asistencia" class="custom-select form-control"  required v-model="item.asistencia.tipo_asistencia">
                                                        <!-- <option  selected disabled value="">Seleccione</option> -->
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
                            <div v-if="matriculas.length > 0">
                                <button  v-on:click="saveList()" class="btn btn-lg btn-success" type="button">Guardar Llamado</button>
                            </div>
                            <div v-if="matriculas.length == 0">
                                <h4>No hay Registros</h4>
                                <router-link to="/docent/assistmenu" class="btn btn-success" data-dismiss="modal" style="color: white">
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
                            <p>Se llamo a lista exitosamente!</p>
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
                id:null,
                estudiantes:[],
                matriculas:[],
                student:null,
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
            //this.getEstudiantes();
            //this.getEstMateriaconDoc();
        },
        methods:{

            setData(res){
            console.log('aqui va bien',res)
                this.id = res.id;
                this.getEstMateriaconDoc();
            },

            getEstMateriaconDoc(){
                let url =`/api/matricula/${this.id}`;
                axios.get(url).then(response => {
                    //alert("tam: "+ response.data.results.length);
                    for(var i=0; i<response.data.results.length ; i++){
                        let matri = response.data.results[i];
                        // tipo_asistencia[i]= tipo_asist;
                        // observacion_asistencia[i]= observacion_asist,
                        let asistencia = { asistencia: {   'programacion_id':0,
                                                            'tipo_asistencia':0,
                                                             'observacion_asistencia':'',
                                                             'fecha_asistencia':''}};
                        Object.assign(matri,asistencia);

                        this.matriculas.push(matri);
                    }
                console.log(this.matriculas);
                    
                }).catch(error => {
                    console.log("Ocurrio un error" + error);
                    //this.errors = error.response.data.errors;
                });
            },
            saveList: function () {
                
                var url = '/api/asistencia';
                
                axios.post(url,this.matriculas).then(response => {
                    this.errors = [];
                    // alert("guardó!");//al fin lo hizo bien
                    //lazar modal
                    $('#create').modal('show');

                    }).catch(error => {
                            this.errors = error.response.data.errors
                    });

            },
            
        }
    }
</script>