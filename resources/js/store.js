import Vue from 'vue';
import Vuex from 'vuex'
import Pet from './modules/pet'
Vue.use(Vuex)

export default new Vuex.Store({
    modules:{
        Pet
    },
})
