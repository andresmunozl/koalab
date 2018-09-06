<template>
    <div class="card-block">
        <h3 class="card-title">Alumnos</h3>
        <h6 class="card-subtitle mb-2 text-muted">Listado</h6>
        <router-link to="/docent/student/show" >
            <div class="user-progress justify-center">
                <div class="col-sm-3 col-md-2" style="padding: 0;">
                    <img src="assets/panel/images/profile-pic.jpg" alt="profile photo" class="circle profile-photo" style="width: 100%; max-width: 100px;">
                </div>

                <div class="col-sm-9 col-md-10">
                    <h6 class="pt-1">Zulema Leon</h6>
                    <div class="progress progress-custom">
                        <div class="progress-bar bg-primary" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </router-link>
        <router-link to="/docent/student/show" >
            <div class="user-progress justify-center">
                <div class="col-sm-3 col-md-2" style="padding: 0;">
                    <img src="assets/panel/images/profile-pic.jpg" alt="profile photo" class="circle profile-photo" style="width: 100%; max-width: 100px;">
                </div>

                <div class="col-sm-9 col-md-10">
                    <h6 class="pt-1">Yuli Leon</h6>
                    <div class="progress progress-custom">
                        <div class="progress-bar bg-primary" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </router-link><router-link to="/docent/student/show" >
            <div class="user-progress justify-center">
                <div class="col-sm-3 col-md-2" style="padding: 0;">
                    <img src="assets/panel/images/profile-pic.jpg" alt="profile photo" class="circle profile-photo" style="width: 100%; max-width: 100px;">
                </div>

                <div class="col-sm-9 col-md-10">
                    <h6 class="pt-1"><Yidney></Yidney> Leon</h6>
                    <div class="progress progress-custom">
                        <div class="progress-bar bg-primary" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </router-link>


        <div class="divider"></div>
        <h3 class="card-title">Actividades Realizadas a este grupo</h3>
        <h6 class="card-subtitle mb-2 text-muted">Linea de tiempo</h6>
        <ul class="timeline">
            <li>
                <div class="timeline-badge"><em class="fa fa-camera"></em></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h5 class="timeline-title mt-2">Laboratorio de fisica</h5>
                    </div>
                    <div class="timeline-body">
                        <p>Realizar experimento y subir evidencia solo imagenes.</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge primary"><em class="fa fa-link"></em></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h5 class="timeline-title mt-2">Ver video de youtube</h5>
                    </div>
                    <div class="timeline-body">
                        <p>Realizar presentación de el video y subir el link para revisar.</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge"><em class="fa fa-paperclip"></em></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h5 class="timeline-title mt-2">Cuestionario de Ingles</h5>
                    </div>
                    <div class="timeline-body">
                        <p>Realizar cuestionario hasta el vierness.</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>