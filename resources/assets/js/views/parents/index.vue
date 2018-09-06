<template>
    <div class="card-block">
        <h3 class="card-title">Estoy encargado de:</h3>
        <h6 class="card-subtitle mb-2 text-muted">Listado</h6>
        <router-link to="/parents/news" >
            <div class="user-progress justify-center">
                <div class="col-sm-3 col-md-2" style="padding: 0;">
                    <img src="assets/img/profile-pic.jpg" alt="profile photo" class="circle profile-photo" style="width: 100%; max-width: 100px;">
                </div>

                <div class="col-sm-9 col-md-6">
                    <h6 class="pt-1">Andrea Muñoz</h6>
                    <div class="progress progress-custom">
                        <div class="progress-bar bg-primary" style="width: 15%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                </div>

                <div class="col-sm-9 col-md-4">
                    <div class="card text-white bg-primary">
                        <div class="card-block">
                            <router-link to="/parents/reports" class="btn btn-primary btn-lg btn-block">
                                Reportes
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>

            
        </router-link>
        <div class="divider" style="margin-top: 1rem;"></div>
        <router-link to="/parents/news" >
            <div class="user-progress justify-center">
                <div class="col-sm-3 col-md-2" style="padding: 0;">
                    <img src="assets/img/profile-pic.jpg" alt="profile photo" class="circle profile-photo" style="width: 100%; max-width: 100px;">
                </div>

                <div class="col-sm-9 col-md-6">
                    <h6 class="pt-1">Fernanda Muñoz</h6>
                    <div class="progress progress-custom">
                        <div class="progress-bar bg-primary" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="col-sm-9 col-md-4">
                    <div class="card text-white bg-primary">
                        <div class="card-block">
                            <router-link to="/parents/reports" class="btn btn-primary btn-lg btn-block">
                                Reportes
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </router-link>
        <div class="divider" style="margin-top: 1rem;"></div>
        <router-link to="/parents/news" >
            <div class="user-progress justify-center">
                <div class="col-sm-3 col-md-2" style="padding: 0;">
                    <img src="assets/img/profile-pic.jpg" alt="profile photo" class="circle profile-photo" style="width: 100%; max-width: 100px;">
                </div>

                <div class="col-sm-9 col-md-6">
                    <h6 class="pt-1">Pepita Muñoz</h6>
                    <div class="progress progress-custom">
                        <div class="progress-bar bg-primary" style="width: 65%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="col-sm-9 col-md-4">
                    <div class="card text-white bg-primary">
                        <div class="card-block">
                            <router-link to="/parents/reports" class="btn btn-primary btn-lg btn-block">
                                Reportes
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </router-link>
    </div>

    
</template>

