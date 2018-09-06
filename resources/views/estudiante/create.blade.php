<form method="POST" v-on:submit.prevent="createUser" xmlns:v-on="http://www.w3.org/1999/xhtml"
      xmlns:v-bind="http://symfony.com/schema/routing">
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Estudiante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div v-if="Object.keys(errors).length > 0 " class="alert bg-danger" role="alert">
                    <div v-for="error in errors">
                        <span class="label label-danger">@{{ error[0]}}</span>
                    </div>
                </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" v-model="user.name" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastname" class="col-md-4 col-form-label text-md-right">Apellido</label>

                        <div class="col-md-6">
                            <input id="lastname" type="text" class="form-control " v-model="user.lastname" name="lastname"  required>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="document" class="col-md-4 col-form-label text-md-right">Documento</label>

                        <div class="col-md-6">
                            <input id="document" type="number" class="form-control" name="document" v-model="user.document" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" v-model="user.email" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="rol" class="col-md-4 col-form-label text-md-right">Rol</label>

                        <div class="col-md-6">
                            <select id="rol" name="rol" class="custom-select form-control" v-model="user.rol" required>
                                <option selected="">Selecciona un rol</option>
                                <option value="docent">Docente</option>
                                <option value="admin">Admin</option>
                                <option value="student">Student</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">Telefono</label>

                        <div class="col-md-6">
                            <input id="phone" type="numer" class="form-control" name="phone" v-model="user.phone" required>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" v-model="user.password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    {{--
                    admin
                    coordinador
                    studiante
                    docente
                    --}}

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Cotraseña</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="user.confirmed" required>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </div>
</div>
</form>