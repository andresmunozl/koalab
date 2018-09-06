<template>

    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <h3>Actividades</h3>

                    </div>
                    <div class="col-md-2">
                        
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
                                    <button  v-on:click="showEvaluacion(item.id)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
                                </span> &nbsp;Evaluar
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
                
                
                title:'Crear',
                items:null,
                temas:null,
                url:'/api/evaluarActividades',
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
            showEvaluacion(item){
                
                this.$router.push({path:`/docent/evaluate/create/${item}` ,params:{ id: 1234 }});
            }
            
        }
    }
</script>