import Vuex from 'vuex'
import Vue from 'vue'
import $ from 'jquery';
Vue.use(Vuex)
import auth from './auth/auth';
import entradasBlog from './blog/entradas';

let modulos = $.extend( true, auth, entradasBlog);

export default new Vuex.Store(modulos)
