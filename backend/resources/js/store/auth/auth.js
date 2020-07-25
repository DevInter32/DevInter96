import axios from 'axios';

const store = {
    state: {},
    getters: {},
    mutations: {

    },
    actions: {

        LOGIN: ({
            commit
        }, usuario) => {
            return new Promise((resolve, reject) => {
                axios.post(`login`, usuario)
                    .then(({
                        data,
                        status
                    }) => {
                        if (status === 200) {
                            resolve(data);
                        }
                    })
                    .catch(error => {
                        reject(error);
                    })
            });

        },
        LOGOUT: () => {
            //
        }
        // iniciarSesion({}, usuario) {


        //   return new Promise((resolve, reject) => {

        //     var formData = new FormData();
        //     formData.append('email', usuario.email);
        //     formData.append('password', usuario.password);

        //     fetch(`${API_ENDPOIN}login`, {
        //         method: 'POST',
        //         body: formData
        //       }).then(response => response.json())
        //       .catch(error => reject(error))
        //       .then(response => resolve(response));

        //   })
        // },

        // cerrarSesion() {
        //   console.log("cerraste!")
        //   localStorage.removeItem('user');
        // }

    }
}

export default store