<template>
  <div class="container">
    <br />
    <br />
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h4 class="mt-3 text-center">Informacion de perfil</h4>

            <div class="row my-3 d-flex flex-column">
              <img :src="imagen" class="mx-auto img_perfil img-fluid rounded-circle" alt />
              <div class="mx-auto col-6 mt-2">
                <form method="POST" id="formulario_imagen">
                  <label
                    for="file-upload"
                    class="custom-file-upload btn btn-info btn-block"
                  >Cambiar Imagen</label>
                  <input id="file-upload" @change="cambio_imagen" type="file" class="d-none" />
                </form>
              </div>
            </div>

            <div class="row my-3">
              <div class="col-3">
                <span class="text-center">
                  <i class="iconos icon-user"></i>
                </span>
              </div>
              <div class="col-9">
                <span>{{usuario.name}}</span>
              </div>
            </div>
            <div class="row my-3">
              <div class="col-3">
                <span class="text-center">
                  <i class="iconos icon-envelope"></i>
                </span>
              </div>
              <div class="col-9">
                <span>{{usuario.email}}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="my-3 text-center">Cambiar Contraseña</h5>
          </div>
          <form method="POST" @submit.prevent="cambiar_clave">
            <div class="row px-2">
              <div class="col-6">
                <p>Contraseña actual</p>
              </div>
              <div class="col-6">
                <input type="password" class="form-control" v-model="clave" />
              </div>
            </div>
            <div class="row px-2">
              <div class="col-6">
                <p>Nueva contraseña</p>
              </div>
              <div class="col-6">
                <input type="password" class="form-control" v-model="nueva_clave" />
              </div>
            </div>
            <div class="col-6 mx-auto my-3">
              <button class="btn btn-block btn-success">Actualizar Datos</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      token: localStorage.getItem("token"),
      usuario: {
        name: "admin",
        email: "@coreo"
      },
      imagen: "http://devinter.test/storage/img/usuarios/avatar.jpg",
      clave: "",
      nueva_clave: ""
    };
  },

  methods: {
    loadStorageUser() {
      var user = JSON.parse(localStorage.getItem("user")) || null;
      if (user != null) {
        this.usuario.name = user.nombre;
        this.usuario.email = user.email;
        this.imagen = `http://localhost:8000/img/usuarios/${user.imagen_perfil}`;
      }
    },
    
    cargar_perfil() {
      const token = localStorage.getItem("token");
      const config = {
        headers: {
          //Authorization: `Bearer ${token}`
        }
      };

      const bodyParameters = {
        token: token
      };

      axios
        .post(`perfil?token=${token}`)
        .then(response => {
          console.log;
          // this.usuario = response.data;
          // this.imagen = "storage/img/usuarios/" + response.data.imagen_perfil;
        })
        .catch(error => {
          console.log;
        });
    },
    cambio_imagen() {
      var formData = new FormData();
      var imagen = $("#file-upload");
      console.log(imagen[0].files[0]);
      formData.append("file", imagen[0].files[0]);

      axios
        .post("perfil", formData)
        .then(response => {
          this.cargar_perfil();
          this.$alertify.success("Se ha cambiado su imagen de perfil");
        })
        .catch(error => {
          console.log(error);
        });
    },
    cambiar_clave() {
      const params = {
        clave: this.clave,
        nueva_clave: this.nueva_clave
      };
      axios
        .put("password/cambiar", params)
        .then(response => {
          if (response.data.mensaje == "exito") {
            this.$alertify.success("su clave ha sido cambiada");
          } else if (response.data.mensaje == "las claves no son iguales") {
            this.$alertify.error(response.data.mensaje);
          }
          this.clave = "";
          this.nueva_clave = "";
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
  mounted() {
    this.cargar_perfil();
    this.loadStorageUser();
  }
};
</script>

<style scoped>
.card {
  width: 100% !important;
}
.text-black {
  color: black;
}

.iconos {
  font-size: 26px;
  padding: 10px;
}
.img_perfil {
  width: 150px;
  height: 150px;
  border: 1px solid rgba(0, 0, 0, 0.4);
}
</style>