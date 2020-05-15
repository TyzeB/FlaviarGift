import Vue from 'vue';
import VueRouter from 'vue-router';

import RecipientForm from './components/RecipientForm';

Vue.use(VueRouter);

const router = new VueRouter({
  mode: 'history',
  routes:[
    {path:'/recipient', name:'recipient', component:RecipientForm}
  ]
});

export default router;