/*Usuarios  */
if(document.getElementById("user")) {
    new Vue({
        el: '#user',
        created: function () {
            //this.getUsers();
        },
        data: {
            CantidadInput: null,
            user: '',
            password: '',
            errors:[],
            creating:false,
            isDisabled:false,
            btnmessage:'Ingresar'
        },
        methods: {
            login: function () {
                let user ={};
                this.isDisabled = true;
                this.btnmessage='Espere...';
                this.errors=[];
                this.creating = true;
                var url = '/api/login';
                axios.post(url, {
                    username: this.user,
                    password: this.password,
                }).then(response => {
                    console.log("respuesta:", response);
                    if(response.data.error != null){
                        this.errors = {"document":["Usuario o contraseña incorrectos"]};
                        this.isDisabled = false;
                        this.btnmessage='Ingresar';
                    }
                    else{
                        user = response.data.user;
                        switch (user){
                            case 'admin':
                                window.location.href = '/a#/admin';
                                break;
                            case 'student':
                                window.location.href = '/s#/student';
                                break;
                            case 'docent':
                                window.location.href = '/d#/docent';
                                break;
                            case 'parents':
                                window.location.href = '/p#/parents';
                                break;
                        }
                    }

                }).catch(error => {
                    this.isDisabled = false;
                    this.btnmessage='Ingresar';
                    console.log("error");
                    this.errors = error.response.data.errors;
                });
            }
        }
    });
}