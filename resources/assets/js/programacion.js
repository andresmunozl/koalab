/*Usuarios  */
if(document.getElementById("crudProgramacion")) {
    new Vue({
        el: '#crudProgramacion',
        created: function () {
            this.getProgramacion();
        },
        data: {
            programacion:[],
            errors:[]
        },
        methods: {
            getProgramacion: function () {
                var url = '/api/programacion';
                axios.get(url).then(response => {
                    console.log("respuesta:", response);
                   this.programacion = response.data.results;
                }).catch(error => {
                   console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            getProgramacion: function () {
                var url = '/api/programacion';
                axios.get(url).then(response => {
                    console.log("respuesta:", response);
                   this.programacion = response.data.results;
                }).catch(error => {
                   console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },createProgramacion: function () {
                //coming soon
            },
        }
    });
}