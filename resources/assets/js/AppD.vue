<template>
    <router-view class="page" :key="$route.path"></router-view>
</template>
<!--
<template>
        <transition name="fade" mode="out-in">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <div class="card text-white bg-primary">
                            <div class="card-block">
                                <router-link to="/docent/groups" class="btn btn-primary btn-lg btn-block">
                                    Estudiantes
                                </router-link>

                            </div>
                        </div>
                        <br>
                        <div class="card text-white bg-primary">
                            <div class="card-block">
                                <router-link to="/docent/groups" class="btn btn-primary btn-lg btn-block">
                                    Multimedia
                                </router-link>
                            </div>
                        </div>
                        <br>
                        <div class="card text-white bg-primary">
                            <div class="card-block">
                                <button type="button" class="btn btn-primary  btn-lg btn-block">Asignaturas</button>
                            </div>
                        </div>
                        <br>

                        <div class="card text-white bg-primary">
                            <div class="card-block">
                                <button type="button" class="btn btn-primary  btn-lg btn-block">Cuestionarios</button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <router-view class="page" :key="$route.path"></router-view>
                    </div>
                    <div class="col-md-2">
                        <div class="card text-white bg-primary">
                            <div class="card-block">
                                <button type="button" class="btn btn-primary  btn-lg btn-block">Estudiantes</button>
                            </div>
                        </div>
                        <br>
                        <div class="card text-white bg-primary">
                            <div class="card-block">
                                <button type="button" class="btn btn-primary  btn-lg btn-block">Multimedia</button>
                            </div>
                        </div>
                        <br>

                        <div class="card text-white bg-primary">
                            <div class="card-block">
                                <button type="button" class="btn btn-primary  btn-lg btn-block">Asignaturas</button>
                            </div>
                        </div>
                        <br>

                        <div class="card text-white bg-primary">
                            <div class="card-block">
                                <button type="button" class="btn btn-primary  btn-lg btn-block">Cuestionarios</button>
                            </div>
                        </div>





                    </div>
                </div>

            </div>
        </transition>
</template>
-->
