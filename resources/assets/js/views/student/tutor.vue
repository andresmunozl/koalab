<template>
	
        

        <div class="row">
        <div style="padding: 0;" class="col-lg-12">
			<img src="assets/img/profile-pic.jpg" class="circle profile-photo" style="width: 100%; max-width: 100px;">
		</div>
        <div class="card mb-4 col-lg-12">
									<div class="card-block">
										<h3 class="card-title">Enviar mensaje al tutor de la materia</h3>
										<div class="dropdown card-title-btn-container">
											<button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#"><em class="fa fa-search mr-1"></em> More info</a>
												<a class="dropdown-item" href="#"><em class="fa fa-thumb-tack mr-1"></em> Pin Window</a>
												<a class="dropdown-item" href="#"><em class="fa fa-remove mr-1"></em> Close Window</a></div>
										</div>
										<form class="form-horizontal" action="" method="post">
											<fieldset>

                                                <!-- Email input-->
												<div class="form-group">
													<label class="col-12 control-label no-padding" for="email">Correo del tutor</label>
													<div class="col-12 no-padding">
														<input id="email" name="email" type="text" placeholder="Correo electrónico" class="form-control">
													</div>
												</div>
												
												<!-- Message body -->
												<div class="form-group">
													<label class="col-12 control-label no-padding" for="message">Agregar un nuevo mensaje</label>
													<div class="col-12 no-padding">
														<textarea class="form-control" id="message" name="message" placeholder="Por favor ingresa tu mensaje aquí." rows="5"></textarea>
														
													</div>
												</div>
												
												<!-- Form actions -->
												<div class="form-group">
													<div class="col-12 widget-right no-padding">
														<button type="submit" class="btn btn-primary btn-md float-right">Publicar</button>
													</div>
												</div>
											</fieldset>
										</form>
									</div>
								</div>
        <div style="padding: 0;" class="col-lg-12">
			<img src="assets/img/profile-pic.jpg" class="circle profile-photo" style="width: 100%; max-width: 100px;">
		</div>
    </div>

										
    
</template>
