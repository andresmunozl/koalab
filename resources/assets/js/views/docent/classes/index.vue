    <template>
    <div>
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <h3>Mis Clases</h3>

                </div>
               <!-- <div class="col-md-2">
                    <router-link to="/docent/classes/create" class="btn btn-lg btn-success" style="color: white">
                        Crear Nueva
                    </router-link>
                </div>-->
                <div class="col-md-8">

                </div>
            </div>
        </div>
        <br>
<div v-if="ofertas != null" class="container">
        <div class="row">
            <div class="col-xs-2">
                <div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Grupo</th>
            <th >Jornada</th>
            <th >Desde</th>
            <th >Hasta</th>
            <th >Codígo</th>
            <th >Opciones</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in ofertas">
            <td>{{item.materia.name}}</td>
            <td>{{item.oferta.grupo.name}}{{item.oferta.grupo.ext}}</td>
            <td>{{item.oferta.journal}}</td>
            <td>{{item.oferta.start}}</td>
            <td>{{item.oferta.end}}</td>
            <td class="text-success">  <b>{{item.oferta.code}}</b>  </td>
            <td>
                <button  v-on:click="showO(item.materia.materia_id, item.materia.name, item.materia.description)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
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
<div v-if="ofertas === null | ofertas.length ===0">
    <h2>No hay Registros</h2>
</div>
    </div>
</template>
<script>

    export default{
        data(){
            return{
                ofertas:null,
                url:'api/doc/ofertac',
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
            showO(item,name,description){
                this.$router.push({path:`/docent/classes/${item}` ,params:{ name: name,description: description }});

            }
        }
    }
</script>