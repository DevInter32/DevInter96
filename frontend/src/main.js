import Vue from 'vue'
import App from './App.vue'
import axios from 'axios'
import store from './store'
import router from './router'
import VueAlertify from 'vue-alertify';
import {
	API_ENDPOINT
} from '@/constantes/constantes';

Vue.config.productionTip = false
Vue.use(VueAlertify);
axios.defaults.baseURL = `${API_ENDPOINT}`; //con esto ya solo se llama la libreria y el metodo de la api
axios.interceptors.request.use(config=>{ 
    
    var token=JSON.parse(localStorage.getItem('token'))||null;
    config.headers["Authorization"]=`Bearer ${token}`;
    
    return config; 
  },
  error=>{
    loader('stop');    
    return Promise.reject(error);
});
new Vue({
	router,
	store,
	render: h => h(App),
}).$mount('#app')