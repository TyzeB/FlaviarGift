/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import Vue from 'vue';
import App from './components/App';
import RecipientForm from './components/RecipientForm';
import { Datetime } from 'vue-datetime';
import 'vue-datetime/dist/vue-datetime.css'
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import '../css/app.scss';
import VueAxios from './plugins/axios'

Vue.use(VueAxios)
Vue.component('recipient-form', RecipientForm)
Vue.component('datetime', Datetime);


new Vue({
    el: '#app',
    render: h => h(App),
});
