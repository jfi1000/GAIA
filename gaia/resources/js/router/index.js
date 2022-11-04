import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

const routes = [
    {
      path: '/w/inicio',
      name: 'inicio',
      component:  require('../components/dashboard').default
    },
    {
      path: '/w/registro',
      name: 'registro',
      component:  require('../components/registro').default
    },
    {
      path: '/w/seguimiento',
      name: 'seguimiento',
      component:  require('../components/seguimiento').default
    },
    {
        path: '/w/clientes',
        name: 'clientes',
        component:  require('../components/clientes').default
    },
    {
      path: '/w/configuracion',
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
