<template>
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-6">
                    <h3>Colegios</h3>
                </div>
                <div class="col-md-6">
                    <router-link to="/sa/colleges/create" class="btn btn-lg btn-success" style="color: white">
                        Crear Nuevo
                    </router-link>
                </div>
            </div>
            <br>
            <br>
            <div v-if="colleges != null" class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div class="table-responsive">
                            <br>
                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th>Nombre</th>
                                    <th>Codigo DANE</th>
                                    <th >Direccion</th>
                                    <th >Telefono</th>
                                    <th >Email</th>
                                    <th >Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in colleges">

                                    <td>{{item.nombre}}</td>
                                    <td>
                                        {{item.dane}}
                                    </td>
                                    <td>{{item.direccion}}</td>
                                    <td>{{item.telefono}}</td>
                                    <td>{{item.email}}</td>
                                    <td>
                                        <button  v-on:click="showO(item.id)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
                                                </span> &nbsp;Ver
                                        </button>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <div v-if="colleges != null && colleges.length == 0">
                                <h3>No hay registros aún</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

    export default{
        data(){
            return{
                colleges:null,
                url:'api/colleges',
                errors:[]
            }
        },
        created(){
            this.getOfertas();
        },
        methods:{
            getOfertas(){
                console.log("entrs");
                axios.get(this.url).then(response => {
                    console.log("respuesta:", response);
                    this.colleges = response.data.results;
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            showO(item){
                this.$router.push({path:`/colleges/${item}` ,params:{ id: 1234 }});

            }
        }
    }
</script>