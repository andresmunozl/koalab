<template>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <h3>Materias matriculadas</h3>
                    </div>
                    <div class="col-md-8">

                    </div>
                </div>
            </div>
            <div class="col-md-6">
        <br>
        <div v-if="items != null" class="container">
            <div class="row">
                <div class="col-xs-3">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th colspan="2">Materia</th>
                                <!-- <th colspan="2">Oferta</th> -->
                                <th colspan="2">Docente</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="item in items">
                                <td colspan="2">{{item.materia.name}}</td>
                                <!-- <td colspan="2">{{item.oferta_id }}</td> -->
                                <td colspan="2">
                                    {{item.docente.user.name}} {{item.docente.user.lastname}}
                                   
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="items == null" class="container">
                <h5>Aún no estas matriculado en una oferta</h5>
                <p>pide tu código pronto...</p>
        </div>
    </div>
            <div class="col-md-5">
                <br>
            </div>
        </div>
    </div>
</template>
<script>
    
    import DatePicker from 'vue2-datepicker'
    import { FulfillingSquareSpinner } from 'epic-spinners'

    export default{
        components: {
            DatePicker ,
            FulfillingSquareSpinner
        },
        data(){
            return{
                id:null,
                items:null,
                url:'/api/ofertamateria',
                errors:[],
                
            }
        },
        beforeRouteEnter(to, from , next){
            next(vm => vm.setData(to.params))
        },
        beforeRouteUpdate(to, from , next){
            this.setData(to.query);
            next()
        },
        created(){
            // this.getItems();
        },
        methods:{
            setData(res){
            console.log('getito',res)
                this.id = res.id;
                this.getOfert();
            },
            getItems(){
                axios.get(this.url).then(response => {
                    console.log("respuesta:", response);
                    this.items = response.data.results;
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            getOfert(){
                let url =`/api/ofertamateria/${this.id}`;
                axios.get(url).then(response => {
                    console.log("respuesta:", response);
                    this.items = response.data.results;
                    // this.oferta = response.data.results;
                    //this.students = response.data.matricula;
                }).catch(error => {
                    console.log("Ocurrio un error");
                  //  this.errors = error.response.data.errors;
                });
            },

            
        }
    }
</script>
