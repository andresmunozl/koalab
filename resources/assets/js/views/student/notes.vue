<template>

    <div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Notas</h3>
										<div class="dropdown card-title-btn-container">
											<button class="btn btn-sm btn-subtle" type="button"><em class="fa fa-list-ul"></em> View All</button>
											<button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#"><em class="fa fa-search mr-1"></em> More info</a>
											    <a class="dropdown-item" href="#"><em class="fa fa-thumb-tack mr-1"></em> Pin Window</a>
											    <a class="dropdown-item" href="#"><em class="fa fa-remove mr-1"></em> Close Window</a></div>
										</div>
										
										<div class="divider" style="margin-top: 1rem;"></div>
										
                                        <form class="form-horizontal" action="" method="post">
											<fieldset>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label">Materia</label>
                                                    <div class="col-md-9">
                                                        <select class="custom-select form-control">
                                                            <option selected>Escoger materia</option>
                                                            <option value="1">Español y literatura</option>
                                                            <option value="2">Arimética</option>
                                                            <option value="3">Deporte</option>
                                                        </select>
                                                    </div>
											    
                                                    <label class="col-md-3 col-form-label">Fecha inicio</label>
                                                    <div class="col-md-9">
                                                        <input type="date" name="fecha" class="custom-select form-control">
                                                    </div>
                                                    <label class="col-md-3 col-form-label">Fecha final</label>
                                                    <div class="col-md-9">
                                                        <input type="date" name="fecha" class="custom-select form-control">
                                                    </div>

                                                </div>
												<!-- Form actions -->
												<div class="form-group">
													<div class="col-12 widget-right no-padding">
														<button type="submit" class="btn btn-primary btn-md float-right">Generar reporte</button>
													</div>
												</div>
											</fieldset>
										</form>
									</div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <h4>Notas</h4>
                                        </div>
                                        <div class="col-lg-4">
                                            <h4>Comportamiento</h4>
                                        </div>
                                        <div class="col-lg-4">
                                            <h4>Asistencia</h4>
                                        </div>
                                    
                                            
                                    </div>
                                    <div class="row">
                                        
                                        <!-- tabla-->
                                        <div class="table-responsive col-lg-4">
                                            <table class= "table table-hover">
                                                <tr>
                                                <td><strong>Español</strong></td>
                                                <td><strong>Nota</strong></td>
                                                
                                                </tr>
                                                
                                                <tr>
                                                <td>Evaluación 1</td>
                                                <td>3,1</td>
                                                
                                                </tr>
                                                
                                                <tr>
                                                <td>Evaluación 2</td>
                                                <td>3,5</td>
                                                
                                                </tr>
                                                
                                                <tr>
                                                <td>Trabajo 1</td>
                                                <td>3,6</td>
                                                
                                                </tr>
                                                
                                                <tr class="danger">
                                                <td>Trabajo 2</td>
                                                <td>2,5</td>
                                                
                                                </tr>
                                                
                                                <tr>
                                                <td>Exposición</td>
                                                <td>5</td>
                                                
                                                </tr>
                                            </table>
                                        </div>
                                        
                                        <div class="col-lg-4">
                                            
                                            <form>
                                                <p class="clasificacion">
                                                    <input id="radio1" name="estrellas" value="5" type="radio" style="display:none;"><!--
                                                    --><label for="radio1">★</label><!--
                                                    --><input id="radio2" name="estrellas" value="4" type="radio" style="display:none;"><!--
                                                    --><label for="radio2">★</label><!--
                                                    --><input id="radio3" name="estrellas" value="3" type="radio" style="display:none;"><!--
                                                    --><label for="radio3">★</label><!--
                                                    --><input id="radio4" name="estrellas" value="2" type="radio" style="display:none;"><!--
                                                    --><label for="radio4">★</label><!--
                                                    --><input id="radio5" name="estrellas" value="1" type="radio" style="display:none;"><!--
                                                    --><label for="radio5">★</label>
                                                </p>
                                            </form>
                                        </div>
                                        
                                        <div class="col-lg-4">
                                            
                                            
                                        </div>
                                    </div>
								</div>
</template>
