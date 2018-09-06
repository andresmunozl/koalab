<form method="POST" v-on:submit.prevent="createMateria" xmlns:v-on="http://www.w3.org/1999/xhtml"
      xmlns:v-bind="http://symfony.com/schema/routing">
<div class="modal fade" id="modalMateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Materia</h5><!--MATERIAAAAAAAAA-->
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
                            <input id="name" type="text" class="form-control" name="name" v-model="materia.name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ddescripcion" class="col-md-4 col-form-label text-md-right">Descripción</label>

                        <div class="col-md-6">
                            <input id="descripcion" type="text" class="form-control " v-model="materia.descripcion" name="descripcion"  required>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="document" class="col-md-4 col-form-label text-md-right">Año</label>

                        <div class="col-md-6">
                            <input id="anio_id" type="number" class="form-control" min="1800" name="anio_id" v-model="materia.anio_id" required>
                        </div>

                        <!--validar año-->
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