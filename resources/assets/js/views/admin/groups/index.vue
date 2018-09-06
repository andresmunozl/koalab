<template>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <h3>Grupos</h3>
                    </div>
                    <div class="col-md-2">
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
                                <th colspan="2">Nombre</th>
                                <th colspan="2">Sub</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="item in items">
                                <td colspan="2">{{item.name}}</td>
                                <td colspan="2">{{item.ext }}</td>
                                <td>
                                    <button  v-on:click="showO(item)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
                                </span> &nbsp;Ver
                                    </button>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="col-md-5">
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
                                <input class="form-control" type="text" name="placeholder" placeholder="nombre" v-model="group.name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Ext</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="placeholder" placeholder="Sub.. eje :A" v-model="group.ext">
                            </div>
                        </div>
                        <div v-if="group.id != 0">
                            <button  v-on:click="update()" class="btn btn-lg btn-warning" type="button">Actualizar</button>
                        </div>
                        <div v-if="group.id == 0">
                            <button  v-on:click="createM()" class="btn btn-lg btn-success" type="button">Guardar</button>
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
                items:null,
                url:'/api/group',
                errors:[],
                create:false,
                creating:false,
                group:{
                    id:0,
                    name:'',
                    ext:''
                }
            }
        },
        created(){
            this.getItems();
        },
        methods:{
            getItems(){
                axios.get(this.url).then(response => {
                    console.log("respuesta:", response);
                    this.items = response.data.results;
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },

            crte(){
                this.create = true ;
                this.title = 'Crear';
                this.group={
                    id:0,
                        name:'',
                        ext:''
                }
                this.errors=[]
            },

            showO(item){
                this.title = 'Detalle';
                this.create = true;
                this.group = item
                //this.create = true;
                //this.$router.push({path:`/admin/classes/${item}` ,params:{ id: 1234 }});
            },
            createM(){
                this.creating = true;
                this.errors = [];
                axios.post(this.url,this.group).then(response => {
                    this.errors = [];
                    this.group={
                        id:0,
                        name:'',
                        ext:''
                    };
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
                let urll = `/api/group/${this.group.id}`;
                axios.put(urll,this.group).then(response => {
                    this.errors = [];
                    this.group={
                        id:0,
                        name:'',
                        ext:''
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