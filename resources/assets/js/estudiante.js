/*Usuarios  */
if(document.getElementById("crudEstudiantes")) {
    new Vue({
        el: '#crudEstudiantes',
        created: function () {
            this.getEstudiantes();
        },
        data: {
            estudiantes:[],
            errors:[],
            user:{'id':null,'name':'','lastname':'','document':'','email':'','password':'','rol':'student','phone':'','college':'','confirmed':''},
        },
        methods: {
            getEstudiantes: function () {
                var url = '/api/estudiante';
                axios.get(url).then(response => {
                    console.log("respuesta:", response);
                   this.estudiantes = response.data.results;
                }).catch(error => {
                   console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;//hacerlo en el asistencia.js para podeer listar estiudiantes y crear asistencia
                });
            },
            showCreate:function () {
                this.user={'id':null,'name':'','lastname':'','document':'','email':'','password':'','rol':'student','phone':'','college':'','confirmed':''};
                $('#create').modal('show');

            }
            ,createUser: function () {

                var url = '/api/estudiante';
                axios.post(url,this.user).then(response => {
                    this.getEstudiantes();
                    this.errors = [];
                    $('#create').modal('hide');
                    this.user={'id':null,'name':'','lastname':'','document':'','email':'','password':'','rol':'student','phone':'','college':'','confirmed':''};

                }).catch(error => {
                    this.errors = error.response.data.errors
                });
            },
            editUser:function(item ){
                console.log("entra aqui")
               // $('#edit').modal('show');
                this.user.name = item.user.name;
                this.user.id = item.id;
                this.user.lastname = item.user.lastname;
                this.user.document = item.user.document;
                this.user.email = item.user.email;
                this.user.phone = item.user.phone;
                $('#edit').modal('show');

            },
            updateUser(id){
                var url = '/api/estudiante/' + id;
                axios.put(url, this.user).then(response => {
                    this.getEstudiantes();
                    this.errors = [];
                    this.user={'id':null,'name':'','lastname':'','document':'','email':'','password':'','rol':'student','phone':'','college':'','confirmed':''};
                    $('#edit').modal('hide');
                }).catch(error => {
                    this.errors = error.response.data.errors
                });
            }

        }
    });
}