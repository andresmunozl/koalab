<template>
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-6">
                    <h3>Planeador</h3>
                </div>
                <div class="col-md-4">
                    <router-link to="/docent/planeador/create" class="btn btn-lg btn-success" style="color: white">
                          Crear Nuevo
                    </router-link>
                </div>
            </div>
        <br>
            <br>
<div v-if="items != null" class="container">
        <div class="row">
            <div class="col-xs-4">
                <div class="table-responsive">
                    <br>
                    <table class="table table-hover">
                        <thead>
                        <tr>

                            <th>#</th>
                            <th>cod. DANE</th>
                            <th class="d-none d-md-block">Inicio / Fin</th>
                            <th >Horas / Sesiones</th>
                            <th >Colegio</th>
                            <th >Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in items">

                            <td>{{item.id}}</td>
                            <td>{{item.codigo_dane}}</td>
                            <td class="d-none d-md-block">{{item.fecha_inicio}} / {{item.fecha_fin}}</td>
                            <td >{{item.horas}} / {{item.sesiones}}</td>
                            <td >{{item.colegio_id}}</td>
                            <!-- <td class="text-success">  <b>{{item.code}}</b>  </td> -->
                            <td>
                                <button  v-on:click="showP(item.id)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
                                    </span> &nbsp;Ver
                                </button>

                                <button  v-on:click="addEstandar(item.id)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
                                    </span> &nbsp;+ Estandar
                                </button>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
</div>
    </div>
</div>
            <div v-if="items != null && items.length == 0">
                <h4>No hay planeadores registrados</h4>
            </div>
    </div>
    </div>
</template>
<script>

    export default{
        data(){
            return{
                items:null,
                url:'api/planeador',
                errors:[]
            }
        },
        created(){
            this.getPlaneadores();
        },
        methods:{
            getPlaneadores(){
                axios.get(this.url).then(response => {
                    console.log("respuesta:", response);
                    this.items = response.data.results;
                }).catch(error => {
                    console.log("Ocurrio un error planeadores");
                    this.errors = error.response.data.errors;
                });
            },
            showP(item){
                this.$router.push({path:`/docent/planeador/${item}` ,params:{ id: 1234 }});

            },

            addEstandar(item){
                this.$router.push({path:`/docent/estandares/${item}` ,params:{ id: 1234 }});

            }
        }
    }
</script>