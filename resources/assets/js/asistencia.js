/*Asistencia  */
if(document.getElementById("crudAsistencia")) {
    new Vue({
        el: '#crudAsistencia',
        created: function () {
            this.getEstudiantes();
            this.getAsistencia();
        },
        data: {
            asistencia:[],
            estudiantes:[],
            errors:[]
        },
        methods: {
            getEstudiantes: function () {
                var url = '/api/estudiante';
                axios.get(url).then(response => {
                for(var i=0; i<response.data.results.length ; i++){
                    let student = response.data.results[i];
                    let asist = { asist: {'programacion_id':1,'tipo_asistencia':1,'observacion_asistencia':'','fecha_asistencia':''}};
                    Object.assign(student,asist);
                    this.estudiantes.push(student);
                }
                console.log(this.estudiantes);
                }).catch(error => {
                   console.log("Ocurrio un error");
                    this.errors = error.response.data.errors;
                });
            },
            saveList: function () {
                
                var url = '/api/asistencia';
                
                axios.post(url,this.estudiantes).then(response => {
                    
                    //this.getEstudiantes();
                    this.errors = [];
                    window.location.href = "../menuAsistencia#/";

                    }).catch(error => {
                            this.errors = error.response.data.errors
                    });

            }, 
            getAsistencia(id){
                
                var url = '/api/asistencia/' + id;
                
                axios.get(url).then(response => {
                    
                    console.log("respuesta:", response);
                   this.asistencia = response.data.results;
                    
                }).catch(error => {
                    console.log("Ocurrio un error");
                    this.errors = error.response.data.errors
                });

                
            }
        }
    });
}