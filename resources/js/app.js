/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');



//import moment for date formating  
import moment from 'moment';
//import VForm
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;

// Import Sweet Alert
import swal from 'sweetalert2';
//make sweet alert global
window.swal = swal;
//register the toaster from sweet alert
const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
})
//make toaster global
window.toast = toast;

//register as a global component
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//import vue progress bar
import VueProgressBar from 'vue-progressbar';
//Usage of Vue Progress Bar
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '10px'
})



//import vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

let routes = [
    { path: '/home', component: require('./components/Home.vue').default },
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/developer', component: require('./components/Developer.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default},
    { path: '/company', component: require('./components/Company.vue').default}
  ]

  const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })

  //text to capital letter global variable
  Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
  })

  //format date global variable
  Vue.filter('myDate', function(created){
    return moment(created).format('MMMM Do YYYY, h:mm:ss a');
  })

  //creating a new Vue Instance
  window.Fire = new Vue();



//Passport Components
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);
//close passports components

Vue.component('example-component', require('./components/ExampleComponent.vue'));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('searchbar', require('./components/SearchBar.vue').default); 

const app = new Vue({
    el: '#app',
    router,
});
