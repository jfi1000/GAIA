import Vuex from 'vuex';
import Vue from 'vue';
import modules from './modules/common'; 
Vue.use(Vuex);

export default new Vuex.Store({
    modules,
})
