<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                    <div>
                        <h3>Matricularse</h3>
                        <p>Ingresa el codígo que te proporcionó tu director de grupo para matricular este año lectivo</p>
                        <div class="divider"></div>
        <!-- {{ Auth::user()->id }} poner el numero del id -->
        <div class="card-block">
            <div v-if="Object.keys(errors).length > 0 " class="alert bg-danger" role="alert">
                <div v-for="error in errors">
                    <span class="label label-danger">{{ error[0]}}</span>
                </div>
            </div>
            <div class="form-group row">
                <label class=" col-form-label">Código de la oferta</label>
                <input class="form-control" type="text"  v-model="codetype" name="codetype" placeholder="Código de la oferta">
            </div>                

            </div>

        <button type="button" class="btn btn-lg btn-success"  v-on:click="save()">Matricularme</button>
       <router-link to="/student" class="btn btn-lg btn-danger"  style="color: white">
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
                            <div v-if="!finish ">
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
                                <h5>{{mensaje}}</h5>
                                
                                 <router-link to="/student/clases" class="btn btn-lg btn-primary" style="color: white">
                                    Aceptar
                                </router-link>

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

                 <div v-if="!saving && finish">
                     <h5>{{mensaje}}</h5>

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
                url:'/api/matricula',
                codetype:null,
                errors:[],
                mensaje:''
            }
        },
        created(){
        },
        methods:{
            save(){
                this.errors = [];
                this.saving = true;
                axios.post(this.url,{'code':this.codetype}).then(response => {
                    this.errors = [];
                    console.log('respuesta',response.data.results)
                    if(response.data.results !==null){
                        if (response.data.results==1){
                            this.saving = false;
                            this.finish = true;
                            this.mensaje='Codigo no coincide con ninguno registrado'
                        }
                        else if (response.data.results==2){
                            this.saving = false;
                            this.finish = true;
                            this.mensaje='Guardado Exitosamente'
                            this.$router.push({path:`/student/clases` });

                        }
                    }
                    else{
                        this.saving = false;
                        this.finish = true;
                        this.mensaje='Estudiante ya se ecuentra matriculado'
                    }
                }).catch(error => {
                    this.finish = true;
                    this.errors = error.response.data.errors;
                    this.saving = false;
                });
            }
        }
    }
</script>