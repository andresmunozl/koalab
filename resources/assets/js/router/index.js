import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
    routes: [
        { path: '/', redirect: '/docent' },
        { path: '/docent', component: require('../views/docent/index.vue') },
        { path: '/docent/groups', component: require('../views/docent/grupos/index.vue') },
        { path: '/docent/classes', component: require('../views/docent/classes/index.vue') },
        { path: '/docent/classes/create', component: require('../views/docent/classes/create.vue') },
        { path: '/docent/classes/:id', component: require('../views/docent/classes/show.vue') },
        { path: '/docent/classes/:id/edit', component: require('../views/docent/classes/edit.vue') },
       

        { path: '/docent/student', component: require('../views/docent/student/index.vue') },
        { path: '/docent/student/show', component: require('../views/docent/student/show.vue') },
        { path: '/docent/student/show', component: require('../views/docent/student/show.vue') },
        { path: '/student', component: require('../views/student/index.vue') },
        { path: '/student/blog', component: require('../views/student/blog.vue') },
        { path: '/student/news', component: require('../views/student/anuncios.vue') },
        { path: '/student/schedule', component: require('../views/student/schedule.vue') },
        { path: '/student/tutor', component: require('../views/student/tutor.vue') },
        { path: '/student/notes', component: require('../views/student/notes.vue') },
        { path: '/student/schedule/day', component: require('../views/student/day.vue') },
        { path: '/student/schedule/subject', component: require('../views/student/subject.vue') },
        { path: '/student/schedule/subject/multimedia', component: require('../views/student/multimedia.vue') },
        { path: '/student/schedule/subject/activities', component: require('../views/student/activities.vue') },

        { path: '/parents', component: require('../views/parents/index.vue') },
        { path: '/parents/news', component: require('../views/parents/news.vue') },
        { path: '/parents/reports', component: require('../views/parents/reports.vue') },
        //gestor institucion
        { path: '/admin', component: require('../views/admin/index.vue') },
        { path: '/admin/materias', component: require('../views/admin/materias/index.vue') },
        { path: '/admin/groups', component: require('../views/admin/groups/index.vue') },
        { path: '/admin/ofertas', component: require('../views/admin/oferta/index.vue') },
        { path: '/admin/ofertas/create', component: require('../views/admin/oferta/create.vue') },
        { path: '/admin/ofertas/:id', component: require('../views/admin/oferta/show.vue') },
         //programacion
         { path: '/admin/progra', component: require('../views/admin/progra/index.vue') },
         //docente asistencia
         { path: '/docent/takeAssist/:id', component: require('../views/docent/assist/takeAssist.vue') },
         { path: '/docent/assist/:id', component: require('../views/docent/assist/index.vue') },
         { path: '/docent/assistmenu', component: require('../views/docent/assist/menu.vue') },
         { path: '/docent/assist/:id/:id', component: require('../views/docent/assist/show.vue') },
         //multimedia docente
         { path: '/docent/recurso/index', component: require('../views/docent/recursos/index.vue') },
         { path: '/docent/recurso/create/:actividadid', component: require('../views/docent/recursos/create.vue') },
         { path: '/docent/recurso/show/:actividadid', component: require('../views/docent/recursos/show.vue') },
         { path: '/docent/recurso/watchR/:recursoid', component: require('../views/docent/recursos/watchR.vue') },
         //evaluacion
         { path: '/docent/evaluate', component: require('../views/docent/evaluate/index.vue') },
         { path: '/docent/evaluate/create/:actividadid', component: require('../views/docent/evaluate/create.vue') },
         //planeardor
        { path: '/docent/planeador', component: require('../views/docent/planeador/index.vue') },
        { path: '/docent/planeador/create', component: require('../views/docent/planeador/create.vue') },
        { path: '/docent/planeador/:id', component: require('../views/docent/planeador/showP.vue') },
        { path: '/docent/desempeno/:temaid', component: require('../views/docent/desempeno/index.vue') },
         { path: '/docent/temas/:competenciaid', component: require('../views/docent/temas/index.vue') },
         { path: '/docent/actividades/:desempenoid', component: require('../views/docent/actividades/index.vue') },
         { path: '/docent/estandares/:planeadoreid', component: require('../views/docent/estandares/index.vue') },
         { path: '/docent/competencias/:estandarid', component: require('../views/docent/competencias/index.vue') },
         //fin planeador
         //matricula estudiante pruebas
        //  { path: '/admin/matriculate', component: require('../views/admin/matriculate/index.vue') },
        //  { path: '/admin/mysubjects/:id', component: require('../views/admin/matriculate/mysubjects.vue') },

        //matricula estudiante
        { path: '/student/matriculate', component: require('../views/student/matriculate/index.vue') },
        { path: '/student/clases', component: require('../views/student/clases/index.vue') },
        { path: '/student/clases/:id', component: require('../views/student/clases/show.vue') },
        { path: '/student/mysubjects/:id', component: require('../views/student/matriculate/mysubjects.vue') },

        //SA
        { path: '/sa', component: require('../views/superadmin/index.vue') },
        { path: '/sa/colleges', component: require('../views/superadmin/colleges/index.vue') },
        { path: '/sa/colleges/create', component: require('../views/superadmin/colleges/create.vue') },
        { path: '/colleges/:id', component: require('../views/superadmin/colleges/show.vue') },


    ]
})

export default router
