<template>
    <div>
        <div class="row">
            <div class="col-lg-2">
                <p>Hora</p>
            </div>
            <div class="col-lg-9">
              <h5>Asignatura</h5>
            </div>

        </div>
        <div class="list-group">
            <router-link to="/student/schedule/subject">
                <div class="row">
                    <div class="col-lg-2">
                        <p>7-9</p>
                    </div>
                    <div class="col-lg-7">
                        <h5>Español y Literatura</h5>
                        <p>Yuly Garces</p>
                    </div>
                    <div class="col-lg-2">
                        <img src="assets/img/iconolibro.jpg" width="50" height="50">
                    </div>

                </div>
            </router-link>
            <div class="divider" style="margin-top: 1rem;"></div>
            <router-link to="/student/schedule/subject">
                <div class="row">
                    <div class="col-lg-2">
                        <p>9-11</p>
                    </div>
                    <div class="col-lg-7">
                        <h5>Aritmética</h5>
                        <p>Zulema León</p>
                    </div>
                    <div class="col-lg-2">
                        <img src="assets/iconolibro.jpg" width="50" height="50">
                    </div>

                </div>
            </router-link>
            <div class="divider" style="margin-top: 1rem;"></div>
            <router-link to="/student/schedule/subject">
                <div class="row">
                    <div class="col-lg-2">
                        <p>11-13</p>
                    </div>
                    <div class="col-lg-7">
                        <h5>Deporte</h5>
                        <p>Andrés Muñoz</p>
                    </div>
                    <div class="col-lg-2">
                        <img src="assets/img/iconolibro.jpg" width="50" height="50">
                    </div>

                </div>
            </router-link>
            <div class="divider" style="margin-top: 1rem;"></div>
        </div>

        <div class="text-white">
            <div>
                <router-link to="/student/schedule" class="btn btn-primary btn-lg">
                    Volver
                </router-link>
            </div>
        </div>
    </div>
</template>