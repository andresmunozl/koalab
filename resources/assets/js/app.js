import Vue from 'vue'
import AppD from './AppD.vue'
import AppE from './AppE.vue'
import AppA from './AppA.vue'
import AppP from './AppP.vue'
import AppSA from './AppSA.vue'
import axios from 'axios'
import 'whatwg-fetch'
import router from './router'
window.Vue = Vue;

window.axios = axios;

//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.filter('maxtd', function (value) {
    if (!value) return ''
    value = value.toString()
    if (value.length>40)
    {
        return (value.substring(0, 40))+'...';
    }
    else{
        return value;
    }

    // return value.charAt(0).toUpperCase() + value.slice(1)
})
router.beforeEach((to,from,next) =>{
    next()
});
if(document.getElementById("rootD")) {
    const app = new Vue({
        el: '#rootD',
        render: h => h(AppD),
        router
    });
}
if(document.getElementById("rootEst")) {
    const app = new Vue({
        el: '#rootEst',
        render: h => h(AppE),
        router
    });
}
if(document.getElementById("rootA")) {
    const app = new Vue({
        el: '#rootA',
        render: h => h(AppA),
        router
    });
}
if(document.getElementById("rootP")) {
    const app = new Vue({
        el: '#rootP',
        render: h => h(AppP),
        router
    });
}if(document.getElementById("rootSa")) {
    const app = new Vue({
        el: '#rootSa',
        render: h => h(AppSA),
        router
    });
}