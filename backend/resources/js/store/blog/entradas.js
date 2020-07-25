import {API_ENDPOINT} from '@/constantes/constantes';

const store = {
  state: {
  },
  getters: {
  },
  mutations: {

  },
  actions: {

      cargarEntradas({}, pagina){
        
        return new Promise((resolve,reject) => {

            fetch(`${API_ENDPOINT}entradas?page=${pagina}`, {
            method: 'GET',
            }).then(response => response.json())
            .catch(error => reject(error))
            .then(response => resolve(response));

        })
      },

  }
}

export default store
