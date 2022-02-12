import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from './components/pages/Home';
import About from './components/pages/About';
import Contacts from './components/pages/Contacts';
import Posts from './components/pages/Posts';

const router = new VueRouter({
  mode:'history',

  routes:[
    {
      path:'/',
      name:'home',
      component: Home
    },
    {
      path:'/chi-siamo',
      name:'about',
      component: About
    },
    {
      path:'/contatti',
      name:'contacts',
      component: Contacts
    },
    {
      path:'/blog',
      name:'blog',
      component: Posts
    }
  ]
})

export default router;