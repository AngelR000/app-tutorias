
require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('tutores-component', require('./components/TutoresComponent.vue').default);
Vue.component('tutor-component', require('./components/TutorComponent.vue').default);
Vue.component('rtutor-component', require('./components/RtutorComponent.vue').default);

const app = new Vue({
    el: '#app',
});
