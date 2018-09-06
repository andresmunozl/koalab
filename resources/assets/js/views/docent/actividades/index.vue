<template>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <h3>Actividades</h3>

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
                                <th>Tipo</th>
                                <!-- <th class="d-none d-md-block">Tema</th> -->
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr v-for="item in items">
                                <td>{{item.id}}</td>
                                <td>{{item.nombre}}</td>
                                <td class="d-none d-md-block">{{item.descripcion}}</td>
                                <!-- <td>{{item.tipo}}</td> -->
                                <td v-show="item.tipo == 1">Enseñanza</td>
                                <td v-show="item.tipo == 2">Aprendizaje</td>
                                <td v-show="item.tipo == 3">Evaluación</td>
                                <!-- <td class="d-none d-md-block">{{item.tema.nombre}}</td> -->
                                <td>
                                    <button  v-on:click="showA(item)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
                                </span> &nbsp;Ver
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
                                <input class="form-control" type="text" name="placeholder" placeholder="nombre" v-model="actividad.nombre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Descripcion</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="placeholder" placeholder="Descripcion" v-model="actividad.descripcion">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Tipo</label>
                            <div class="col-md-9">
                                <!-- <input class="form-control" type="text" name="placeholder" placeholder="Descripcion" v-model="actividad.tipo"> -->
                                <select class="custom-select form-control" v-model="actividad.tipo">
                                    <option value="1">Enseñanza</option>
                                    <option value="2">Aprendizaje</option>
                                    <option value="3">Evaluación</option>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label class="col-md-3 col-form-label">Tema</label>
                            <div class="col-md-9">
                                <select class="custom-select form-control" v-model="actividad.tema_id">
                                    <option v-for="tema in temas" v-bind:value="tema.id">{{tema.nombre}}</option>
                                </select>
                            </div>
                        
                        </div> -->

                        <div v-if="actividad.id != 0">
                            <button  v-on:click="update()" class="btn btn-lg btn-warning" type="button">Actualizar</button>
                        </div>
                        <div v-if="actividad.id == 0">
                            <button  v-on:click="createA()" class="btn btn-lg btn-success" type="button">Guardar</button>
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
                desempenoid:null,
                prue:null,
                title:'Crear',
                items:null,
                temas:null,
                url:'/api/actividades',
                urlT: '/api/temas',
                errors:[],
                create:false,
                creating:false,
                actividad:{
                    id:0,
                    nombre:'',
                    descripcion:'',
                    tipo:0,
                    tema_id:0,
                    desempeno_id:this.desempenoid
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
            // this.getTemas();
        },
        methods:{
            setData(res){
            console.log('aqui va',res)
                this.desempenoid = res.desempenoid;
                this.actividad.desempenoid = this.desempenoid;
                this.getItems();
                // alert(this.estandarid);
            },
            getItems(){

                this.actividad.desempenoid = this.desempenoid;
                let urlid = `/api/actividades/${this.desempenoid}`;
                
                axios.get(urlid).then(response => {
                    console.log("respuesta:", response);
                    this.items = response.data.results;
                    // this.getTemas();
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            getTemas(){
                
                axios.get(this.urlT).then(response => {
                    console.log("respuesta:", response);
                    this.temas = response.data.results;
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },

            crte(){
                this.create = true ;
                this.title = 'Crear';
                this.actividad={
                            id:0,
                            nombre:'',
                            descripcion:'',
                            tipo:0,
                            tema_id:0,
                            desempeno_id:this.desempenoid
                    }
            },

            showA(item){
                this.title = 'Detalle';
                this.create = true;
                this.actividad = item
                //this.create = true;
                //this.$router.push({path:`/admin/classes/${item}` ,params:{ id: 1234 }});
            },
            createA(){
                this.creating = true;
                this.errors = [];
                axios.post(this.url,this.actividad).then(response => {
                    this.errors = [];
                    this.actividad={
                            id:0,
                            nombre:'',
                            descripcion:'',
                            tipo:0,
                            tema_id:0,
                            desempeno_id:this.desempenoid
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
                let urll = `/api/actividades/${this.actividad.id}`;
                axios.put(urll,this.actividad).then(response => {
                    this.errors = [];
                    this.actividad={
                            id:0,
                            nombre:'',
                            descripcion:'',
                            tipo:0,
                            tema_id:0,
                            desempeno_id:this.desempenoid
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