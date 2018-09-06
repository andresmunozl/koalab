<template>
    <div class="container">
        <h3>Crear Nuevo Colegio</h3>
<div class="divider"></div>
        <div class="row">
            <div class="col-md-6">
                <div>
                    <h4 class="text-success">Datos Obligatorios</h4>
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
                                <input class="form-control"  type="text"  v-model="college.nombre" name="nombre" placeholder="Ingrese nombre ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Código DANE</label>
                            <div class="col-md-9">
                                <input class="form-control"  type="text"  v-model="college.dane" name="dane" placeholder="Ingrrese la identificación ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Telefono</label>
                            <div class="col-md-9">
                                <input class="form-control"  type="text"  v-model="college.telefono" name="telefono" placeholder="Ingrese el número">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Dirección</label>
                            <div class="col-md-9">
                                <input class="form-control"  type="text"  v-model="college.direccion" name="direccion" placeholder="Ingrese la dirección">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Sector</label>
                            <div class="col-md-9">
                                <select class="custom-select form-control" v-model="college.sector">
                                    <option value="publico">Publico</option>
                                    <option value="privado">Privado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
            <div class="col-md-6" >
                <div>
                    <h4 class="text-info">Datos Opcionales</h4>
                    <br>
                    <div class="card-block">


                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Correo</label>
                            <div class="col-md-9">
                                <input class="form-control"  type="text"  v-model="college.email" name="email" placeholder="Correo@example.com ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Sitio Web</label>
                            <div class="col-md-9">
                                <input class="form-control"  type="text"  v-model="college.website" name="website" placeholder="www... ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Calendario</label>
                            <div class="col-md-9">
                                <select class="custom-select form-control" v-model="college.calendario">
                                    <option value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="c">Otro</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <br>
                    <br>
                </div>
                <div v-if="usuario!=null" >
                    <div class="row  border border-success">
                        <div >
                            <br>

                            <div>
                                <h5>    Datos De Acceso (Podrás Modificarlos Luego)</h5>
                                <h4 class="text-info">   Usuario: {{usuario.username}}</h4>
                                <h4 class="text-info">   Contraseña: bambooclass</h4>
                                      <button type="button"   class="btn btn-lg btn-success"  v-on:click="finishh()">Aceptar</button>
                                <br>
                                <br>
                            </div>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-lg btn-success" v-bind:class="{disabled: saving}" v-on:click="save()">Registrar</button>
            <router-link to="/sa/colleges" class="btn btn-lg btn-danger" v-bind:class="{disabled: saving}" style="color: white">
                Cancelar
            </router-link>
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
                url:'/api/colleges',
                college:{
                    nombre: null,
                    dane: null,
                    telefono: null,
                    email: null,
                    website: null,
                    sector: null,
                    direccion:null,
                    calendario:null
                },
                errors:[],
                docents:[],
                usuario :null
            }
        },
        created(){

        },
        methods:{
            save(){
                this.errors = [];
                this.saving = true;

                axios.post(this.url,this.college).then(response => {
                    this.errors = [];
                    this.usuario = response.data.results;
                    this.finish = true;
                   // this.$router.back();
                }).catch(error => {
                    this.errors = error.response.data.errors;
                    this.saving = false;
                });
            },
            finishh(){
                this.$router.back();
            }
        }
    }
</script>