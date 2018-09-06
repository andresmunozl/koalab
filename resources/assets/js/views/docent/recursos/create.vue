<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                    <div>
        <h3>Subir video</h3>
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
                    <input class="form-control" type="text" name="placeholder" placeholder="nombre" v-model="recurso.nombre">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Descripcion</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="placeholder" placeholder="Descripcion" v-model="recurso.descripcion">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">Recurso</label>
                <div class="col-md-9">
                    <input type="file" @change="processFile($event)">
                    <!-- <input class="form-control" type="file" name="miniatura"  v-on:change="recurso.miniatura"> -->
                </div>
            </div>

               
        </div>

        <button type="button" class="btn btn-lg btn-success" v-bind:class="{disabled: saving}" v-on:click="save()">Guardar</button>
       <router-link to="/docent/recurso/index" class="btn btn-lg btn-danger" v-bind:class="{disabled: saving}" style="color: white">
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
                                <h5>Video guardado</h5>
                                
                                <router-link to="/docent/recurso/index" class="btn btn-lg btn-primary" style="color: white">
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
import DatePicker from "vue2-datepicker";
import { FulfillingSquareSpinner } from "epic-spinners";
export default {
  components: {
    DatePicker,
    FulfillingSquareSpinner
  },
  data() {
    return {
      url:'api/recursos',
      saving: false,
      finish: false,
      recurso: {
        id: 0,
        user_id:0,
        actividad_id:0,
        nombre:'',
        descripcion:'',
        estado:'',
        miniatura:[],
        recurso:''
      },
      actividadid:null,
      errors: []
    };
  },
    beforeRouteEnter(to, from , next){
        next(vm => vm.setData(to.params))
    },
    beforeRouteUpdate(to, from , next){
        this.setData(to.query);
        next()
    },
  created() {
    // this.getGroups();
  },
  methods: {
      setData(res){
                console.log('aqui va',res)
                this.actividadid = res.actividadid;
                this.recurso.actividad_id = this.actividadid;
                //this.getItems();
                // alert(this.competenciaid);
            },

    processFile(event) {
        this.recurso.miniatura = event.target.files[0]
    },
    
    save() {
      this.errors = [];
      this.saving = true;

      axios.post(this.url, this.recurso).then(response => {
          this.errors = [];
          
          this.finish = true;
        })
        .catch(error => {
          this.errors = error.response.data.errors;
          this.saving = false;
        });
    }
  }
};
</script>