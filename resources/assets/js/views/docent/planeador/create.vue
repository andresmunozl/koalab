<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                    <div>
        <h3>Crear Nuevo planeador</h3>
        <br>
        <div class="card-block">
            <div v-if="Object.keys(errors).length > 0 " class="alert bg-danger" role="alert">
                <div v-for="error in errors">
                    <span class="label label-danger">{{ error[0]}}</span>
                </div>
            </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Horas</label>
                    <div class="col-md-9">
                        <input class="form-control"  type="number"  v-model="planeador.horas" name="horas" >   <!-- placeholder="Seleccione la fecha " -->
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Sesiones</label>
                    <div class="col-md-9">
                        <input class="form-control"  type="number"  v-model="planeador.sesiones" name="codigo_dane" >   <!-- placeholder="Seleccione la fecha " -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Inicio</label>
                    <div class="col-md-9">
                        <input class="form-control"  type="date"  v-model="planeador.fecha_inicio" name="start" placeholder="Seleccione la fecha ">
                        <!--<date-picker v-model="oferta.start" format="YYYY-MM-DD" :lang="lang"></date-picker>-->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Fin</label>
                    <div class="col-md-9">
                        <input class="form-control" type="date"  v-model="planeador.fecha_fin" name="end" placeholder="Seleccione la fecha">
                        <!--<date-picker  v-model="oferta.end" format="YYYY-MM-DD" :lang="lang"></date-picker>-->
                    </div>
                </div>
            </div>
        <button type="button" class="btn btn-lg btn-success" v-bind:class="{disabled: saving}" v-on:click="save()">Guardar</button>
        <button class="btn btn-lg btn-danger" v-bind:class="{disabled: saving}" v-on:click="back()" style="color: white">
         Cancelar</button>
       <br>
       <br>
    </div>
            </div>
            <div class="col-md-6" id="saved">
                <div  v-if="saving">
                    <!--<div class="card-header">Default Card</div>-->
                    <div >
                        <div class="row  border border-success">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <br>
                            <br>
                            <br>
                            <br>
                            <div v-if="!finish">
                            <fulfilling-square-spinner
                                    :animation-duration="500"
                                    :size="150"
                                    color="#6b8f0a"
                            />
                                <br>
                                <br>
                                <h3>Creando...</h3>
                            </div>
                            <br>
                            <br>
                        </div>
                        <div class="col-md-4"></div>
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
                materias:[],
                saving:false,
                finish:false,
                url:'/api/planeador',
                planeador:{
                    horas:null,
                    sesiones:null,
                    fecha_inicio:null,
                    fecha_fin:null,
                    materia_id:null
                },
                errors:[],
                docents:[]



            }
        },
        created(){
            //this.getDocents();

        },
        methods:{
            
            save(){
                
                    this.errors = [];
                    this.saving = true;
                    alert("aaaa");
                    axios.post(this.url, this.planeador).then(response => {
                        this.errors = [];
                        this.finish = true;
                        alert("bbbb");
                        this.$router.back();
                    }).catch(error => {
                        this.errors = error.response.data.errors;
                        this.saving = false;
                    });
                
            },
            back(){
                this.$router.back();
            }
        }
    }
</script>
