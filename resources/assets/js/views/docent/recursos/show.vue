<template>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <h3>Recursos encontrados</h3>

                    </div>
                    <div class="col-md-2">
                        <!--<router-link to="/admin/materias/create" class="btn btn-lg btn-success" style="color: white">
                            Crear Nueva
                        </router-link>-->
                        <button  v-on:click="AddResource(actividadid)" class="btn btn-lg btn-success" type="button">Crear Nuevo</button>
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
                                <th class="d-none d-md-block">miniatura</th>
                                <!-- <th>Planeador</th> -->
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr v-for="item in items">
                                <td>{{item.id}}</td>
                                <td>{{item.nombre}}</td>
                                <td class="d-none d-md-block"></td>
                                <td>
                                    <button  v-on:click="showR(item.id)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
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
                actividadid:null,
                title:'Crear',
                items:null,
                url:'/api/recursos',
                errors:[],
                create:false,
                creating:false,
                recurso:{
                    id:0,
                    nombre:'',
                    descripcion:'',
                    planeador_id:this.actividadid//cambiar a datos de recurso
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
                this.actividadid = res.actividadid;
                this.recurso.actividadid = this.actividadid;
                this.getItems();
            },
            getItems(){
                let urlid = `/api/recursos/${this.actividadid}`;
                
                axios.get(urlid).then(response => {
                    console.log("respuesta:", response);
                    this.items = response.data.results;
                    
                }).catch(error => {
                    console.log("Ocurrio un error en getItems recursos");
                    this.errors = error.response.data.errors;
                });
            },
            AddResource(item){
                this.$router.push({path:`/docent/recurso/create/${item}` ,params:{ id: 1234 }});
            },

            showR(item){
                this.$router.push({path:`/docent/recurso/watchR/${item}` ,params:{ id: 1234 }});
            },

        }
    }
</script>