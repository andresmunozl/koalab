<template>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <h3>Programación</h3>

                    </div>
                    <div class="col-md-2">
                        <!--<router-link to="/admin/materias/create" class="btn btn-lg btn-success" style="color: white">
                            Crear Nueva
                        </router-link>-->
                        <button  v-on:click="crte()" class="btn btn-lg btn-success" type="button">Nueva Programación</button>
                    </div>
                    <div class="col-md-8">

                    </div>
                </div>
            </div>
            <div class="col-md-6">

        <br>
        <div v-if="programs != null" class="container">
            <div class="row">
                <div class="col-xs-2">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Número de programación</th>
                                <th>Materia</th>
                                <th >Id docente</th>
                                <th >Id oferta</th>
                                <th >Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="item in programs">
                                <td>{{item.programacion_id}}</td>
                                <td>{{item.materia.name}}</td>
                                <td>{{item.docente_id}}</td>
                                <td>{{item.oferta_id}}</td>
                                <td>
                                    <button  v-on:click="showProg(item)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
                                        </span> &nbsp;Ver
                                    </button>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                        <div v-if="programs.length ==0">
                            <h3>No hay registros</h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
            <div class="col-md-6">
                <br>
                <div class="row border border-success" v-if="create">
                    <div v-if="!creating" class="card-block">
                        <h3 class="card-title">{{title}}</h3>
                        <div v-if="Object.keys(errors).length > 0 " class="alert bg-danger" role="alert">
                            <div v-for="error in errors">
                                <span class="label label-danger">{{ error[0]}}</span>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">id oferta</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="placeholder" placeholder="id oferta" v-model="programacion.oferta_id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">id materia</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="placeholder" placeholder="id materia" v-model="programacion.materia_id">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">id docente</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="placeholder" placeholder="id oferta" v-model="programacion.docente_id">
                            </div>
                        </div>

                        
                        <div v-if="programacion.programacion_id != 0">
                            <button  v-on:click="update()" class="btn btn-lg btn-warning" type="button">Actualizar</button>
                        </div>
                        <div v-if="programacion.programacion_id == 0">
                            <button  v-on:click="createProg()" class="btn btn-lg btn-success" type="button">Guardar</button>
                        </div>

                    </div>
                    <div class="card-block" v-if="creating">
                        <hollow-dots-spinner
                                :animation-duration="1000"
                                :dot-size="25"
                                :dots-num="3"
                                color="#6b8f0a"
                        />
                        <br>
                        <br>
                        <h3  class="card-title">   Creando...</h3>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
    import { HollowDotsSpinner } from 'epic-spinners'

    export default{

        components: {
            HollowDotsSpinner
        },
        data(){
            return{
                title:'Crear',
                programs:null,
                url:'/api/programacion',
                errors:[],
                create:false,
                creating:false,
                programacion:{
                    programacion_id:0,
                    docente_id:0,
                    materia_id:0,
                    oferta_id:0,
                }
            }
        },
        created(){
            this.getprogramaciones();
        },
        methods:{
            getprogramaciones(){
                axios.get(this.url).then(response => {
                    console.log("respuesta:", response);
                    this.programs = response.data.results;
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            crte(){
                this.create = true;
                this.title = 'Crear';
                this.programacion={
                    programacion_id:0,
                    docente_id:0,
                    materia_id:0,
                    oferta_id:0,
                }
            },

            showProg(item){
                this.title = 'Detalle';
                this.create = true;
                this.programacion = item
                //this.create = true;
                //this.$router.push({path:`/admin/classes/${item}` ,params:{ id: 1234 }});
            },
            createProg(){
                
                this.creating = true;
                this.errors = [];
                
                axios.post(this.url,this.programacion).then(response => {
                    this.errors = [];
                    this.programacion={
                        programacion_id:0,
                        docente_id:0,
                        materia_id:0,
                        oferta_id:0,
                    }
                    
                    this.create = false;
                    
                    this.creating = false;
                    
                    this.getprogramaciones();
                }).catch(error => {
                    this.errors = error.response.data.errors;
                    this.creating = false;
                });
            },
            update(){
                this.creating = true;
                this.errors = [];
                let urll = `/api/programacion/${this.programacion.programacion_id}`;
                axios.put(urll,this.programacion).then(response => {
                    this.errors = [];
                    programacion={
                        programacion_id:0,
                        docente_id:0,
                        materia_id:0,
                        oferta_id:0,
                    }
                    this.create = false;
                    this.creating = false;
                    this.getprogramaciones();
                }).catch(error => {
                    this.errors = error.response.data.errors;
                    this.creating = false;
                });

            }
            
        }
    }
</script>