require('./bootstrap');

window.Vue = require('vue');
let VueScrollTo = require('vue-scrollto');

import App from './components/app'
import Members from './components/pages/members/index'
import ValidationErrors from './components/parts/validationErrors'


Vue.component('members', Members);
Vue.component('validation-errors', ValidationErrors);

if (document.getElementById('vue_app')) {
    const app = new Vue({
        el: '#vue_app',
        render: h => h(App)
    });
}
