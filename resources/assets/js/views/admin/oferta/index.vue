<template>
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-4">
                    <h3>Ofertas</h3>
                </div>
                <div class="col-md-6">
                    <router-link to="/admin/ofertas/create" class="btn btn-lg btn-success" style="color: white">
                          Crear Nueva
                    </router-link>
                </div>
            </div>
        <br>
            <br>
<div v-if="ofertas != null" class="container">
        <div class="row">
            <div class="col-xs-2">
                <div class="table-responsive">
                    <br>
    <table class="table table-hover">
        <thead>
        <tr>

            <th>Grupo</th>
            <th>Director</th>
            <th >Jornada</th>
            <th >Desde</th>
            <th >Hasta</th>
            <th >Codígo</th>
            <th >Opciones</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in ofertas">

            <td>{{item.grupo.name}}{{item.grupo.ext}}</td>
            <td>
                <div v-if="item.director !== null">
                    {{item.director.user.name}} {{item.director.user.lastname}}
                </div>
            </td>
            <td>{{item.journal}}</td>
            <td>{{item.start}}</td>
            <td>{{item.end}}</td>
            <td class="text-success">  <b>{{item.code}}</b>  </td>
            <td>
                <button  v-on:click="showO(item.id)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
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
            <div v-if="ofertas != null && ofertas.length == 0">
                <h4>No hay Oferas Registradas</h4>
            </div>
    </div>
    </div>
</template>
<script>

    export default{
        data(){
            return{
                ofertas:null,
                url:'api/oferta',
                errors:[]
            }
        },
        created(){
            this.getOfertas();
        },
        methods:{
            getOfertas(){
                axios.get(this.url).then(response => {
                    console.log("respuesta:", response);
                    this.ofertas = response.data.results;
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            showO(item){
                this.$router.push({path:`/admin/ofertas/${item}` ,params:{ id: 1234 }});

            }
        }
    }
</script>