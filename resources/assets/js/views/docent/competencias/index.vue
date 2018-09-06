<template>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Competencias</h3>
                        <!-- <h5>estandar: {{estandares.nombre}}</h5> -->

                    </div>
                    <div class="col-md-2">
                        <!--<router-link to="/admin/materias/create" class="btn btn-lg btn-success" style="color: white">
                            Crear Nueva
                        </router-link>-->
                        <button  v-on:click="crte()" class="btn btn-lg btn-success" type="button">Crear Nueva</button>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
            <div class="col-md-6">

        <br>
        <div v-if="items != null" class="container">
            <div class="row">
                <div class="col-xs-2">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th class="d-none d-md-block">Descripción</th>
                                <!-- <th>Estandar</th> -->
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr v-for="item in items">
                                <td>{{item.id}}</td>
                                <td>{{item.nombre}}</td>
                                <td class="d-none d-md-block">{{item.descripcion}}</td>
                                <!-- <td>{{item.estandar_id}}</td> -->
                                <td>
                                    <button  v-on:click="showC(item)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
                                </span> &nbsp;Ver
                                    </button>
                                    <button  v-on:click="addtema(item.id)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
                                </span> &nbsp;+ Temas
                                    </button>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                        <div v-if="items.length ==0">
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
                            <label class="col-md-3 col-form-label">Nombre</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="placeholder" placeholder="nombre" v-model="competencia.nombre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Descripcion</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="placeholder" placeholder="Descripcion" v-model="competencia.descripcion">
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label class="col-md-3 col-form-label">Estandar</label>
                            <div class="col-md-9">
                                <select class="custom-select form-control" v-model="competencia.estandar_id">
                                    <option v-for="estandar in estandares" v-bind:value="estandar.id">{{estandar.nombre}}</option>
                                </select>
                            </div> -->
                        
                        </div>

                        <div v-if="competencia.id != 0">
                            <button  v-on:click="update()" class="btn btn-lg btn-warning" type="button">Actualizar</button>
                        </div>
                        <div v-if="competencia.id == 0">
                            <button  v-on:click="createC()" class="btn btn-lg btn-success" type="button">Guardar</button>
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
                estandarid:null,
                title:'Crear',
                items:null,
                estandares:null,
                urlE: '/api/estandar',
                url:'/api/competencia',
                errors:[],
                create:false,
                creating:false,
                competencia:{
                    id:0,
                    nombre:'',
                    descripcion:'',
                    estandar_id:this.estandarid
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
            //this.getItems();
            //this.getEstandares();
        },
        methods:{
            setData(res){
            console.log('aqui va',res)
                this.estandarid = res.estandarid;
                this.competencia.estandar_id = this.estandarid;
                this.getItems();
                // alert(this.estandarid);
            },
            getItems(){
                this.competencia.estandar_id = this.estandarid;
                let urlid = `/api/competencia/${this.estandarid}`;
                // alert("aqui va: "+urlid);
                axios.get(urlid).then(response => {
                    console.log("respuesta:", response);
                    this.items = response.data.results;
                    //alert(this.items.length());
                    // this.getEstandares();
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            addtema(item){
                this.$router.push({path:`/docent/temas/${item}` ,params:{ id: 1234 }});
            },
            // getEstandares(){
                
            //     axios.get(this.urlE).then(response => {
            //         console.log("respuesta:", response);
            //         this.estandares = response.data.results;
            //     }).catch(error => {
            //         console.log("Ocurrio un error");
            //         this.errors = error.response.data.errors;
            //     });
            // },

            crte(){
                this.create = true ;
                this.title = 'Crear';
                this.competencia={
                            id:0,
                            nombre:'',
                            descripcion:'',
                            estandar_id:this.estandarid,
                    }
            },

            showC(item){
                this.title = 'Detalle';
                this.create = true;
                this.competencia = item
                //this.create = true;
                //this.$router.push({path:`/admin/classes/${item}` ,params:{ id: 1234 }});
            },
            createC(){

                this.creating = true;
                this.errors = [];
                axios.post(this.url,this.competencia).then(response => {
                    this.errors = [];
                    this.competencia={
                            id:0,
                            nombre:'',
                            descripcion:'',
                            estandar_id:this.estandarid
                    }
                    this.create = false;
                    this.creating = false;
                    this.getItems();
                }).catch(error => {
                    this.errors = error.response.data.errors;
                    this.creating = false;
                });
            },
            update(){
                this.creating = true;
                this.errors = [];
                let urll = `/api/competencia/${this.competencia.id}`;
                axios.put(urll,this.competencia).then(response => {
                    this.errors = [];
                    this.competencia={
                            id:0,
                            nombre:'',
                            descripcion:'',
                            estandar_id:this.estandarid
                    }
                    this.create = false;
                    this.creating = false;
                    this.getItems();
                }).catch(error => {
                    this.errors = error.response.data.errors;
                    this.creating = false;
                });

            }

        }
    }
</script>