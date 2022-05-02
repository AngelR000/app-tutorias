
require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('tutores-component', require('./components/TutoresComponent.vue').default);
Vue.component('tutor-component', require('./components/TutorComponent.vue').default);
Vue.component('rtutor-component', require('./components/RtutorComponent.vue').default);

Vue.component('estudiantes-component', require('./components/EstudiantesComponent.vue').default);
Vue.component('estudiante-component', require('./components/EstudianteComponent.vue').default);
Vue.component('restudiante-component', require('./components/RestudianteComponent.vue').default);
Vue.component('todos-component', require('./components/TodosComponent.vue').default);
const app = new Vue({
    el: '#app',
});
