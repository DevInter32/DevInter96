import {
  API_ENDPOINT
} from '@/constantes/constantes';

const store = {
  state: {},
  getters: {},
  mutations: {

  },
  actions: {

    cargarEntradas({}, pagina) {
      var token = JSON.parse(localStorage.getItem('token'));
      return new Promise((resolve, reject) => {

        fetch(`${API_ENDPOINT}entradas?page=${pagina}`, {
            method: 'GET',
            headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/x-www-form-urlencoded',
              'Authorization': `Bearer ${token}`
            },
          }).then(response => response.json())
          .catch(error => reject(error))
          .then(response => resolve(response));

      })
    },

  }
}

export default store