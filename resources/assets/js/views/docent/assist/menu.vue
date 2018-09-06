<template>
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-5">
                    <h3>Menú asistencia</h3>
                </div>
                    <div class="col-md-8">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Escoge la materia</label>
                            <div class="col-md-9">
                                <select class="custom-select form-control" v-model="programsid">
                                    <option v-for="item in ofertamateria" v-bind:value="item.oferta_id">{{item.materia.name}} oferta:{{item.oferta_id}}</option>
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
               <button  v-on:click="showList(programsid)" class="btn btn-success margin" type="button"><span class="fa fa-eye">
                    </span> &nbsp;LLamar Asistencia
                </button>
            </div>
            <div class="col-md-4">
                <button  v-on:click="showListAsist(programsid)" class="btn btn-success margin" type="button"><span class="fa fa-eye">
                    </span> &nbsp;ver Asistencias
                </button>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                urlP:'/api/ofertamateria',
                oferts:null,
                materias:null,
                programsid:null,
                matriculas:[],
                ofertamateria:[],
                errors:[]
            }
        },
        created(){
            this.getOfertaMateria();
        },
        methods:{
            getOfertaMateria(){
                //this.urlP= `/api/ofertamateria/${this.programsid}`
                axios.get(this.urlP).then(response => {
                    console.log("respuesta:", response);
                    this.ofertamateria = response.data.results;
                    // ['materia_id','oferta_id','docente_id','tenantid'];
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            showList(item){
                this.$router.push({path:`/docent/takeAssist/${item}` ,params:{ id: 1234 }});
            },
            showListAsist(item){
                this.$router.push({path:`/docent/assist/${item}` ,params:{ id: 1234 }});
            }
           
        }
    }

    
</script>