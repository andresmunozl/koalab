if(document.getElementById("userAS")) {
    new Vue({
        el: '#userAS',
        created: function () {
            //this.getUsers();
            console.log('si entraaaaaaa');
        },
        data: {
            CantidadInput: null,
            password: '',
            errors:[],
            creating:false,
            username: '',
            isDisabled:false,
            btnmessage:'Ingresar'
        },
        methods: {
            login: function () {
                this.isDisabled = true;
                this.btnmessage='Espere...';
                this.errors=[];
                this.creating = true;
                var url = '/sa/api/login';
                console.log(this.username)
                console.log(this.password)
                axios.post(url, {
                    username: this.username,
                    password: this.password,
                }).then(response => {
                    console.log("respuesta:", response);
                    if(response.data.error != null){
                        this.errors = {"document":["Usuario o contraseña incorrectos"]};
                        this.isDisabled = false;
                        this.btnmessage='Ingresar';


                    }
                    else{
                        switch (response.data.user){
                            case 'sa':
                                window.location.href = '/sa#/sa';
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