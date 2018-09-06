<template>
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-5">
                    <h3>Agregar multimedia</h3>
                </div>
                    <div class="col-md-8">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Escoge la actividad</label>
                            <div class="col-md-9">
                                <select class="custom-select form-control" v-model="actividadid">
                                    <option v-for="item in actividades" v-bind:value="item.id">{{item.nombre}} en desempeño: {{item.desempeno.nombre}}</option>
                                </select>
                            </div>
                        
                        </div>

                    
                    </div>
                
            </div>
            <br>
            <br>

        </div>

        <div class="row">
            <div class="col-md-4">
               <button  v-on:click="AddResource(actividadid)" class="btn btn-success margin" type="button"><span class="fa fa-eye">
                    </span> &nbsp;Agregar multimedia
                </button>
            </div>
            <div class="col-md-4">
                <button  v-on:click="showResource(actividadid)" class="btn btn-success margin" type="button"><span class="fa fa-eye">
                    </span> &nbsp;Ver multimedia
                </button>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                urlA:'/api/actividades',
                oferts:null,
                materias:null,
                actividadid:null,
                
                actividades:[],
                errors:[]
            }
        },
        created(){
            this.getActividad();
        },
        methods:{
            getActividad(){
                //this.urlP= `/api/ofertamateria/${this.programsid}`
                axios.get(this.urlA).then(response => {
                    console.log("respuesta:", response);
                    this.actividades = response.data.results;
                   
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            AddResource(item){
                this.$router.push({path:`/docent/recurso/create/${item}` ,params:{ id: 1234 }});
            },
            showResource(item){
                this.$router.push({path:`/docent/recurso/show/${item}` ,params:{ id: 1234 }});
            }
           
        }
    }

    
</script>