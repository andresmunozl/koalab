<template>
    <router-view class="page" :key="$route.path"></router-view>
</template>

<!--<template>
        <transition name="fade" mode="out-in">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <div class="card text-white bg-primary">
                            <div class="card-block">
                                <router-link to="/student/schedule" class="btn btn-primary btn-lg btn-block">
                                    Horario
                                </router-link>

                            </div>
                        </div>
                        <br>
                        <div class="card text-white bg-primary">
                            <div class="card-block">
                                <router-link to="/student/news" class="btn btn-primary btn-lg btn-block">
                                    Anuncios
                                </router-link>
                            </div>
                        </div>
                        <br>
                        <div class="card text-white bg-primary">
                            <div class="card-block">
                                <router-link to="/student/blog" class="btn btn-primary btn-lg btn-block">
                                    Blog
                                </router-link>
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
                                <button type="button" class="btn btn-primary  btn-lg btn-block">Notas</button>
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
                                <button type="button" class="btn btn-primary  btn-lg btn-block">Actividades</button>
                            </div>
                        </div>
                        <br>

                        <div class="card text-white bg-primary">
                            <div class="card-block">
                                <button type="button" class="btn btn-primary  btn-lg btn-block">Tutor</button>
                            </div>
                        </div>





                    </div>
                </div>

            </div>
        </transition>
</template>-->
