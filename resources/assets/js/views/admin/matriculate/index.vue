<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <h3>Matricula</h3>
                    <br>
                    <div class="card-block">
                        <div v-if="Object.keys(errors).length > 0 " class="alert bg-danger" role="alert">
                            <div v-for="error in errors">
                                <span class="label label-danger">{{ error[0]}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Código de la oferta</label>
                            <input class="form-control" type="text"  v-model="codetype" name="codetype" placeholder="Código de la oferta">
                        </div>

                    </div>

                    <button type="button" class="btn btn-lg btn-success"  v-on:click="save()">Matricularme</button>
                    <router-link to="/student/index" class="btn btn-lg btn-danger"  style="color: white">
                        Cancelar
                    </router-link>
                    <br>
                    <br>
                </div>
            </div>
            <div class="col-md-6" id="saved">
                <div  v-if="saving" >
                    <!--<div class="card-header">Default Card</div>-->
                    <div >
                        <div class="row  border border-success">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <br>
                                <br>
                                <br>
                                <br>
                                <div v-if="!finish && !notFound">
                                    <fulfilling-square-spinner
                                            :animation-duration="500"
                                            :size="150"
                                            color="#6b8f0a"
                                    />
                                    <br>
                                    <br>
                                    <h3>Matrículando...</h3>

                                </div>
                                <div v-if="finish">
                                    <h5>Matrículado exitosamente!</h5>

                                    <!-- <router-link to="../admin/mysubjects" class="btn btn-lg btn-primary" style="color: white">
                                        Ver materias matriculadas
                                    </router-link> -->
                                    <button  v-on:click="showO(matricula.oferta_id)" class="btn btn-info margin" type="button"><span class="fa fa-eye">
                                    </span> &nbsp;Ver materias matriculadas
                                    </button>
                                    <br>
                                    <br>
                                </div>


                                <br>
                                <br>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>

                <div v-if="notFound && !finish">
                    <h5>Código no encontrado</h5>
                    <p>Intentalo de nuevo</p>

                    <br>
                    <br>
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
                found:false,
                userId:1,//averiguar como obtener id del usu logeado
                matri:null,
                oferts:[],
                saving:false,
                finish:false,
                notFound:false,
                urlOferts:'/api/oferta',
                url:'/api/matricula',
                matricula:{
                    id:0,
                    'fecha':null,
                    'oferta_id':0,
                    'student_id':0,
                    'estado':0,
                },
                codetype:'',
                errors:[],
            }
        },
        created(){
            this.getOferts();
        },
        methods:{
            getOferts(){
                axios.get(this.urlOferts).then(response => {
                    console.log("respuesta:", response);
                    this.oferts = response.data.results;
                    
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            save(){
                
                var cont=0;
                this.errors = [];
                this.saving = true;

                while(cont < this.oferts.length && !this.found){
                    if(this.oferts[cont].code === this.codetype){
                        alert("encontrado!");
                        this.found = true;//salga del ciclo cuando este encontrado
                        //seteando en el objeto que se va a mandar a guardar
                        this.matricula.oferta_id = this.oferts[cont].id;
                        this.matricula.student_id = this.userId;
                        this.matricula.estado = 1;
                        
                        axios.post(this.url,this.matricula).then(response => {
                            this.errors = [];
                            
                            this.finish = true;
                            

                        }).catch(error => {
                            this.errors = error.response.data.errors;
                            this.saving = false;

                        });
                        
                        
                    }
                    
                    cont++;
                }
                // alert(this.found);
                if(!this.found){
                    // alert(this.found);
                    this.notFound=true;
                    this.saving=false;
                }
                
            },
            showO(item){
                this.$router.push({path:`/admin/mysubjects/${item}` ,params:{ id: 1234 }});

            }
            
        }
    }
</script>