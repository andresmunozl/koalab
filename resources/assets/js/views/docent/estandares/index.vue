<template>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <h3>Estandares</h3>

                    </div>
                    <div class="col-md-2">
                        <!--<router-link to="/admin/materias/create" class="btn btn-lg btn-success" style="color: white">
                            Crear Nueva
                        </router-link>-->
                        <button  v-on:click="crte()" class="btn btn-lg btn-success" type="button">Crear Nuevo</button>
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
                                <!-- <th>Planeador</th> -->
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr v-for="item in items">
                                <td>{{item.id}}</td>
                                <td>{{item.nombre}}</td>
                                <td class="d-none d-md-block">{{item.descripcion}}</td>
                                <!-- <td>{{item.planeador_id}}</td> -->
                                <td>
                                    <button  v-on:click="showE(item)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
                                </span> &nbsp;Ver
                                    </button>
                                    <br>
                                    <button  v-on:click="addcompetencia(item.id)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
                                </span> &nbsp;+ competencia
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
                                <input class="form-control" type="text" name="placeholder" placeholder="nombre" v-model="estandar.nombre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Descripcion</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="placeholder" placeholder="Descripcion" v-model="estandar.descripcion">
                            </div>
                        </div>
                        <div v-if="estandar.id != 0">
                            <button  v-on:click="update()" class="btn btn-lg btn-warning" type="button">Actualizar</button>
                        </div>
                        <div v-if="estandar.id == 0">
                            <button  v-on:click="createE()" class="btn btn-lg btn-success" type="button">Guardar</button>
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
                planeadoreid:null,
                title:'Crear',
                items:null,
                url:'/api/estandar',
                errors:[],
                create:false,
                creating:false,
                estandar:{
                    id:0,
                    nombre:'',
                    descripcion:'',
                    planeador_id:this.planeadoreid
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
        },
        methods:{
            setData(res){
                console.log('aqui va',res)
                this.planeadoreid = res.planeadoreid;
                this.estandar.planeador_id = this.planeadoreid;
                this.getItems();
            },
            getItems(){

                this.estandar.planeador_id = this.planeadoreid;
                let urlid = `/api/estandar/${this.planeadoreid}`;
                
                axios.get(urlid).then(response => {
                    console.log("respuesta:", response);
                    this.items = response.data.results;
                    
                }).catch(error => {
                    console.log("Ocurrio un error en getItems estandares");
                    this.errors = error.response.data.errors;
                });
            },

            addcompetencia(item){
                this.$router.push({path:`/docent/competencias/${item}` ,params:{ id: 1234 }});
            },

            crte(){
                this.create = true ;
                this.title = 'Crear';
                this.estandar={
                            id:0,
                            nombre:'',
                            descripcion:'',
                            planeador_id:this.planeadoreid
                    }
            },

            showE(item){
                this.title = 'Detalle';
                this.create = true;
                this.estandar = item
            },
            createE(){
                this.creating = true;
                this.errors = [];
                axios.post(this.url,this.estandar).then(response => {
                    this.errors = [];
                    this.estandar={
                            id:0,
                            nombre:'',
                            descripcion:'',
                            planeador_id:this.planeadoreid
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
                let urll = `/api/estandar/${this.estandar.id}`;
                axios.put(urll,this.estandar).then(response => {
                    this.errors = [];
                    this.estandar={
                            id:0,
                            nombre:'',
                            descripcion:'',
                            planeador_id:this.planeadoreid
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