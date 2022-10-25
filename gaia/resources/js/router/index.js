import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

const routes = [
    {
      path: '/inicio',
      name: 'inicio',
      component:  require('../components/dashboard').default
    },
    {
      path: '/registro',
      name: 'registro',
      component:  require('../components/registro').default
    },
    {
      path: '/seguimiento',
      name: 'seguimiento',
      component:  require('../components/seguimiento').default
    },
    {
        path: '/clientes',
        name: 'clientes',
        component:  require('../components/clientes').default
    },
    {
      path: '/configuracion',
      name: 'configuracion',
      component:  require('../components/configuracion').default
  },
    
];

const router = new VueRouter({
   mode: 'history',
  linkActiveClass: 'is-active',
  base: process.env.MIX_BASE_URL,
  routes,
});

export default router;
