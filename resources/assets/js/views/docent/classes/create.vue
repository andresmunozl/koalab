<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                    <div>
        <h3>Crear Nueva Oferta</h3>
        <br>
        <div class="card-block">
            <div v-if="Object.keys(errors).length > 0 " class="alert bg-danger" role="alert">
                <div v-for="error in errors">
                    <span class="label label-danger">{{ error[0]}}</span>
                </div>
            </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Nombre</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="placeholder" placeholder="nombre" v-model="oferta.name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Descripcion</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="placeholder" placeholder="Descripcion" v-model="oferta.description">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Desde</label>
                    <div class="col-md-9">
                        <input class="form-control"  type="date"  v-model="oferta.start" name="start" placeholder="Seleccione la fecha ">
                        <!--<date-picker v-model="oferta.start" format="YYYY-MM-DD" :lang="lang"></date-picker>-->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Hasta</label>
                    <div class="col-md-9">
                        <input class="form-control" type="date"  v-model="oferta.end" name="end" placeholder="Seleccione la fecha">
                        <!--<date-picker  v-model="oferta.end" format="YYYY-MM-DD" :lang="lang"></date-picker>-->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Grupo</label>
                    <div class="col-md-9">
                        <select class="custom-select form-control" v-model="oferta.group">
                            <option v-for="item in groups" v-bind:value="item.id">{{item.name}} {{item.ext}}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Jornada</label>
                    <div class="col-md-9">
                        <select class="custom-select form-control" v-model="oferta.journal">
                            <option v-bind:value="1">Mañana</option>
                            <option v-bind:value="2">Tarde</option>
                            <option v-bind:value="3">Noche</option>
                            <option v-bind:value="4">Fin de semana</option>
                        </select>
                    </div>
                </div>
            </div>

        <button type="button" class="btn btn-lg btn-success" v-bind:class="{disabled: saving}" v-on:click="save()">Registrar</button>
       <router-link to="/docent/classes" class="btn btn-lg btn-danger" v-bind:class="{disabled: saving}" style="color: white">
           Cancelar
       </router-link>
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
                            <div v-if="finish">
                                <h5>Codigo para matricular</h5>
                                <h1 class="text-primary">{{oferta.code}}</h1>
                                <router-link to="/docent/classes" class="btn btn-lg btn-primary" style="color: white">
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
                groups:[],
                saving:false,
                finish:false,
                urlG:'/api/group',
                url:'/api/oferta',
                oferta:{
                    'name':'',
                    'description':'',
                    'start':null,
                    'end':null,
                    'group':null,
                    'calendar':null,
                    'journal':null,
                    'code':null
                },
                errors:[],
                lang: {
                    days: ['Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vie', 'Sab'],
                    months: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    pickers: ['sig 7 dias', 'sig 30 dias', 'prev 7 sig', 'prev 30 sig'],
                    placeholder: {
                        date: 'Selecciona Fecha',
                        dateRange: 'Selecciona rango de fechas'
                    }
                },


            }
        },
        created(){
            this.getGroups();
        },
        methods:{
            getGroups(){
                axios.get(this.urlG).then(response => {
                    console.log("respuesta:", response);
                    this.groups = response.data.results;
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            save(){
                this.errors = [];
                this.saving = true;

                axios.post(this.url,this.oferta).then(response => {
                    this.errors = [];
                    this.oferta.code = response.data.results;
                    this.finish = true;
                }).catch(error => {
                    this.errors = error.response.data.errors;
                    this.saving = false;
                });
            }
        }
    }
</script>