<template>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <h3>Desempeño</h3>

                    </div>
                    <div class="col-md-2">
                        <!--<router-link to="/admin/materias/create" class="btn btn-lg btn-success" style="color: white">
                            Crear Nueva
                        </router-link>-->
                        <button  v-on:click="crte()" class="btn btn-lg btn-success" type="button">Crear Nueva</button>
                    </div>
                    <div class="col-md-8">

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
                                <!-- <th>Comp</th> -->
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr v-for="item in items">
                                <td>{{item.id}}</td>
                                <td>{{item.nombre}}</td>
                                <td class="d-none d-md-block">{{item.descripcion}}</td>
                                <!-- <td>{{item.tema_id}}</td> -->
                                <td>
                                    <button  v-on:click="showD(item)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
                                </span> &nbsp;Ver
                                    </button>
                                    <button  v-on:click="addactividad(item.id)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
                                </span> &nbsp;+ actividad
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
                                <input class="form-control" type="text" name="placeholder" placeholder="nombre" v-model="desempeno.nombre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Descripcion</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="placeholder" placeholder="Descripcion" v-model="desempeno.descripcion">
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label class="col-md-3 col-form-label">Competencia</label>
                            <div class="col-md-9">
                                <select class="custom-select form-control" v-model="desempeno.tema_id">
                                    <option v-for="compe in competencias" v-bind:value="compe.id">{{compe.nombre}}</option>
                                </select>
                            </div> -->
                        
                        </div>

                        <div v-if="desempeno.id != 0">
                            <button  v-on:click="update()" class="btn btn-lg btn-warning" type="button">Actualizar</button>
                        </div>
                        <div v-if="desempeno.id == 0">
                            <button  v-on:click="createD()" class="btn btn-lg btn-success" type="button">Guardar</button>
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
                temaid:null,
                title:'Crear',
                items:null,
                competencias:null,
                url:'/api/desempeno',
                urlC:'/api/competencia',
                errors:[],
                create:false,
                creating:false,
                desempeno:{
                    id:0,
                    nombre:'',
                    descripcion:'',
                    tema_id:this.temaid
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
            // this.getItems();
            // this.getCompetencias();
        },
        methods:{
            setData(res){
                console.log('aqui va',res)
                this.temaid = res.temaid;
                this.desempeno.tema_id = this.temaid;
                this.getItems();
                // alert(this.temaid);
            },
            getItems(){

                this.desempeno.tema_id = this.temaid;
                let urlid = `/api/desempeno/${this.temaid}`;
                
                axios.get(urlid).then(response => {
                    console.log("respuesta:", response);
                    this.items = response.data.results;
                    
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            addactividad(item){
                this.$router.push({path:`/docent/actividades/${item}` ,params:{ id: 1234 }});
            },
            
            // getCompetencias(){
                
            //     axios.get(this.urlC).then(response => {
            //         console.log("respuesta:", response);
            //         this.competencias = response.data.results;
            //     }).catch(error => {
            //         console.log("Ocurrio un error");
            //         this.errors = error.response.data.errors;
            //     });
            // },

            crte(){
                this.create = true ;
                this.title = 'Crear';
                this.desempeno={
                            id:0,
                            nombre:'',
                            descripcion:'',
                            tema_id:this.temaid
                    }
            },

            showD(item){
                this.title = 'Detalle';
                this.create = true;
                this.desempeno = item
                //this.create = true;
                //this.$router.push({path:`/admin/classes/${item}` ,params:{ id: 1234 }});
            },
            createD(){
                this.creating = true;
                this.errors = [];
                axios.post(this.url,this.desempeno).then(response => {
                    this.errors = [];
                    this.desempeno={
                            id:0,
                            nombre:'',
                            descripcion:'',
                            tema_id:this.temaid
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
                let urll = `/api/desempeno/${this.desempeno.id}`;
                axios.put(urll,this.desempeno).then(response => {
                    this.errors = [];
                    this.desempeno={
                            id:0,
                            nombre:'',
                            descripcion:'',
                            tema_id:this.temaid
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