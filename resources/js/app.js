
require('./bootstrap');

window.Vue = require('vue');

Vue.component('user-component', require('./components/UserComponent.vue').default);

const app = new Vue({
   el: '#app'
});
