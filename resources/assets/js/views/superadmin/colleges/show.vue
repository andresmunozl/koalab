<template>
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="row">
                <div class="col-md-4">
                    <!-- <h3>{{college.nombre}}</h3> -->

                </div>
                <div class="col-md-4">
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <router-link to="/sa/colleges" class="btn btn-success" style="color: white">
                        Volver
                    </router-link>
                        <router-link to="/sa/colleges" class="btn btn-warning " style="color: black" disabled>
                            Editar
                        </router-link>
                    </div>
                </div>
                </div>
                       <!-- <div class="jumbotron">
                            <h1 class="mb-4">{{oferta.name}}</h1>

                        </div>-->
                <div class="divider"></div>
                <!--<p >{{oferta.description}}</p>-->
                <div class="card mb-4">
                    <div class="card-block">

                        <div v-if="!create" class="dropdown card-title-btn-container">
                            <button class="btn btn-sm btn-subtle" type="button"><em class="fa fa-list-ul"></em> View All</button>
                            <button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>
                            <!--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#"><em class="fa fa-search mr-1"></em> More info</a>
                                <a class="dropdown-item" href="#"><em class="fa fa-thumb-tack mr-1"></em> Pin Window</a>
                                <a class="dropdown-item" href="#"><em class="fa fa-remove mr-1"></em> Close Window</a></div>-->
                        </div>
                        <div v-if="!create" class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Dirección</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>Sitio web</th>
                                    <th>Dane</th>
                                    <th>Municipio</th>
                                    <th>Depto</th>                                    
                                    <th>Tipo</th>
                                    <th>Calendario</th>
                                    <th>Sector</th>
                                    <th>Ops</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in colleges">
                                    <td>{{item.codigo}}</td>
                                    <td>{{item.direccion}}</td>
                                    <td>{{item.telefono}}</td>
                                    <td>{{item.email}}</td>
                                    <td>{{item.website}}</td>
                                    <td>{{item.dane}}</td>
                                    <td>{{item.municipio}}</td>
                                    <td>{{item.departamento}}</td>
                                    <td>{{item.tipo}}</td>
                                    <td>{{item.calendario}}</td>
                                    <td>{{item.sector}}</td>
                                    <td> <button class="btn btn-info" style="color: white">
                                        Profesores inscritos
                                    </button>
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                            <!-- <div v-if="colleges.length == 0">
                                <h4>No hay Registros</h4>
                            </div> -->
                        </div>
                        
                    </div>
                </div>
            </div>
            

        </div>
    </div>


</template>
<script>
    import DatePicker from 'vue2-datepicker'
    import { FulfillingSquareSpinner } from 'epic-spinners'
    export default{
        components: { DatePicker ,
            FulfillingSquareSpinner
        },
        data(){
            return{
                id:null,
                colleges:{
                    id:0,
                    //tenantid:'',
                    codigo:'',
                    nombre:'',
                    direccion:'',
                    telefono:'',
                    email:'',
                    website:'',
                    dane:'',
                    departamento:'',
                    municipio:'',
                    state:'',
                    tipo:'',
                    calendario:'',
                    sector:''
                },
                create:false,
                errors:[],
                finish:false,
                saving:false,
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
        },
        methods:{
            setData(res){
            console.log('setData planeador',res)
                this.id = res.id;
                this.colleges.id = res.id;
                this.getcollege();
            },
            getcollege(){
                this.colleges.id = this.id;
                let url = `/api/colleges/${this.id}`;
                axios.get(url).then(response => {
                    console.log("respuesta:", response);
                    this.colleges = response.data.results;
                }).catch(error => {
                    console.log("Ocurrio un error en get Planeador");
                  //  this.errors = error.response.data.errors;
                });
            },
        }
    }
</script>
