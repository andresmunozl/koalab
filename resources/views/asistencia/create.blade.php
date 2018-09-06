<form method="POST" v-on:submit.prevent="createAsistencia" xmlns:v-on="http://www.w3.org/1999/xhtml"
      xmlns:v-bind="http://symfony.com/schema/routing">
<div class="modal fade" id="modalAsistCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Asistencia</h5><!--Asistenciaaaa-->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <div class="modal-body">
                        <label for="asistencia" class="col-md-4 col-form-label text-md-right">Tipo de asistencia</label>
                        <div >
                                <select id="asistencia" name="tipo_asistencia" class="custom-select form-control"  v-for="asist.tipo_asistencia" required><!---->
                                    <option selected="" value="1">Asistió</option>
                                    <option value="2">No Asistió</option>
                                    <option value="3">Asistió tarde</option>
                                    <option value="4">No Asistió (permiso médico)</option>
                                    <option value="2">Otra</option>
                                    <option value="2">Otra1</option>
                                </select>
                    
                            </div>
                            <div>
                                <input id="name" type="hidden" class="form-control" name="estudiante_id" v-model="asist.estudiante_id">
                            </div>
                    
                            <div>
                                <input id="name" type="hidden" class="form-control" name="programacion_id" v-model="asist.programacion_id">
                            </div>
                    
                            <div>
                                <input id="name" type="hidden" class="form-control" name="fecha_asistencia" v-model="asist.fecha_asistencia">
                            </div>
                    
                            <div>
                                <input id="name" type="hidden" class="form-control" name="observacion_asistencia" v-model="asist.observacion_asistencia" value="observa">
                            </div>
                </div>
        
        
        
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    
                </div>
    </div>
</div>
</form>