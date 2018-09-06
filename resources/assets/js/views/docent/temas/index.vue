<template>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <h3>Temas</h3>

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
                                <!-- <th>subtema</th> -->
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr v-for="item in items">
                                <td>{{item.id}}</td>
                                <td>{{item.nombre}}</td>
                                <td class="d-none d-md-block">{{item.descripcion}}</td>
                                <!-- <td>{{item.subtema.nombre}}</td> -->
                                <td>
                                    <button  v-on:click="showT(item)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
                                </span> &nbsp;Ver
                                    </button>
                                    <button  v-on:click="adddesempeno(item.id)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
                                </span> &nbsp;+ desempeño
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
                                <input class="form-control" type="text" name="placeholder" placeholder="nombre" v-model="tema.nombre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Descripcion</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="placeholder" placeholder="Descripcion" v-model="tema.descripcion">
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label class="col-md-3 col-form-label">Escoge el subtema</label>
                            <div class="col-md-9">
                                <select class="custom-select form-control" v-model="tema.subtema">
                                    <option v-for="sub in subtemas" v-bind:value="sub.id">{{sub.nombre}}</option>
                                </select>
                            </div>
                        
                        </div> -->

                        <div v-if="tema.id != 0">
                            <button  v-on:click="update()" class="btn btn-lg btn-warning" type="button">Actualizar</button>
                        </div>
                        <div v-if="tema.id == 0">
                            <button  v-on:click="createT()" class="btn btn-lg btn-success" type="button">Guardar</button>
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
                competenciaid:null,
                title:'Crear',
                items:null,
                url:'/api/temas',
                errors:[],
                create:false,
                creating:false,
                tema:{
                    id:0,
                    nombre:'',
                    descripcion:'',
                    subtema:0,
                    competencia_id:this.competenciaid
                },
                subtemas:null
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
            // this.getSubtema();
        },
        methods:{
            setData(res){
                console.log('aqui va',res)
                this.competenciaid = res.competenciaid;
                this.tema.competencia_id = this.competenciaid;
                this.getItems();
                // alert(this.competenciaid);
            },
            adddesempeno(item){
                this.$router.push({path:`/docent/desempeno/${item}` ,params:{ id: 1234 }});
            },
            getItems(){

                this.tema.competencia_id = this.competenciaid;
                let urlid = `/api/temas/${this.competenciaid}`;

                axios.get(urlid).then(response => {

                    console.log("respuesta:", response);
                    this.items = response.data.results;

                    //this.getSubtema();
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            // getSubtema(){//relacion 1 a 1, mejorarlo de 1 a muchos//por eso hago metodo nuevo
            //     axios.get(this.url).then(response => {
            //         console.log("respuesta:", response);
            //         this.subtemas = response.data.results;
            //     }).catch(error => {
            //         console.log("Ocurrio un error");
            //         this.errors = error.response.data.errors;
            //     });
            // },

            crte(){
                this.create = true ;
                this.title = 'Crear';
                this.tema={
                            id:0,
                            nombre:'',
                            descripcion:'',
                            competencia_id:this.competenciaid
                    }
            },

            showT(item){
                this.title = 'Detalle';
                this.create = true;
                this.tema = item
                
            },
            createT(){
                this.creating = true;
                this.errors = [];
                axios.post(this.url,this.tema).then(response => {
                    this.errors = [];
                    this.tema={
                            id:0,
                            nombre:'',
                            descripcion:'',
                            competencia_id:this.competenciaid
                    }
                    this.create = false;
                    this.creating = false;
                    this.getItems();
                    //this.getSubtema();
                }).catch(error => {
                    this.errors = error.response.data.errors;
                    this.creating = false;
                });
            },
            update(){
                this.creating = true;
                this.errors = [];
                let urll = `/api/temas/${this.tema.id}`;
                axios.put(urll,this.tema).then(response => {
                    this.errors = [];
                    this.tema={
                            id:0,
                            nombre:'',
                            descripcion:'',
                            competencia_id:this.competenciaid
                    }
                    this.create = false;
                    this.creating = false;
                    this.getItems();
                    // this.getSubtema();
                }).catch(error => {
                    this.errors = error.response.data.errors;
                    this.creating = false; 
                });

            }

        }
    }
</script>