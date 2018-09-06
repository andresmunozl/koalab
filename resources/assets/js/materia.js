/*materia  */
if(document.getElementById("crudMateria")) {
    new Vue({
        el: '#crudMateria',
        created: function () {
            this.getMaterias();
        },
        data: {
            materias:[],
            errors:[],
            materia:{'materia_id':null,'name':'','descripcion':'','anio_id':''}
        },
        methods: {
            getMaterias: function () {
                var url = '/api/materia';
                axios.get(url).then(response => {
                    console.log("respuesta:", response);
                   this.materias = response.data.results;
                   
                }).catch(error => {
                   console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            showCreate:function () {
                this.materia={'materia_id':null,'name':'','descripcion':'','anio_id':''};
                $('#modalMateria').modal('show');

            },
            createMateria: function () {
                var url = '/api/materia';
                axios.post(url,this.materia)
                .then(response => {
                    this.getMaterias();
                    this.errors = [];
                    $('#modalMateria').modal('hide');
                    this.materia={'materia_id':null,'name':'','descripcion':'','anio_id':''};

                }).catch(error => {
                    this.errors = error.response.data.errors
                });
            }
        }
    });
}