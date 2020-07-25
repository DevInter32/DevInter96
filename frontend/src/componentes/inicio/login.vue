<template>
  <div class="container">
    <br />
    <br />
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div v-if="hay_mensaje">
          <div class="row justify-content-center">
            <div class="col-md-10">
              <div :class="clase">
                <h4 class="alert-heading">Mensaje Informativo</h4>
                <p>{{ texto_mensaje }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">Inicio de sesion</div>

          <div class="card-body">
            <form method="POST" @submit.prevent="login">
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Correo electronico</label>

                <div class="col-md-6">
                  <input
                    id="email"
                    type="email"
                    class="form-control"
                    name="email"
                    required
                    autocomplete="email"
                    autofocus
                    v-model="usuario.email"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                <div class="col-md-6">
                  <input
                    id="password"
                    type="password"
                    class="form-control"
                    name="password"
                    v-model="usuario.password"
                    required
                    autocomplete="current-password"
                  />
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">Iniciar Sesion</button>

                  <router-link to="/restaurar_clave" class="btn btn-link">
                    ¿Olvidaste tu contraseña ? Puedes recuperarla
                    aqui
                  </router-link>

                  <router-link
                    to="/register"
                    class="btn btn-link"
                  >No tienes una cuenta? Puede registrarse aqui</router-link>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import testLog from "../../middleware/testLog";

export default {
  middleware: [testLog],
  props: {
    mensaje: {
      type: String,
      default: ""
    },
    tipo_mensaje: {
      type: String,
      default: ""
    }
  },
  data() {
    return {
      usuario: {
        email: "",
        password: ""
      },
      hay_mensaje: false,
      clase: "",
      texto_mensaje: ""
    };
  },
  methods: {
    ...mapActions(["iniciarSesion"]),
    login() {
      this.$store
        .dispatch("LOGIN", {
          email: this.usuario.email,
          password: this.usuario.password
        })
        .then(success => {
          console.log(success);
          localStorage.setItem("token", JSON.stringify(success.token));
          localStorage.setItem("user", JSON.stringify(success));
          // console.log(localStorage.getItem("user"));
          // console.log(JSON.stringify(success.access_token));
          this.$alertify.success("Login Completado");
          this.$router.push("blog");
        })
        .catch(error => {
          console.log("Error en login", error);
          this.$alertify.error("Ocurrió un error inesperado");
        });
    }

    // async login() {
    //   try {
    //     let response = await this.iniciarSesion(this.usuario);
    //     if (response.error) {
    //       return this.$alertify.error("Los datos son incorrectos");
    //     }
    //     localStorage.setItem("user", JSON.stringify(response));
    //     console.log(localStorage.getItem("user"));
    //     this.$router.push("blog");
    //     this.$alertify.success("Login Completado");
    //   } catch (error) {
    //     console.log("Error en login", error);
    //     this.$alertify.error("Ocurrió un error inesperado");
    //   }
    // }
  },
  mounted() {
    if (this.mensaje == "verificacion_correo") {
      this.hay_mensaje = true;
      this.texto_mensaje = "Verifique su correo para poder iniciar sesion";
      this.clase = "alert alert-success";
    } else if (this.mensaje == "restauracion_clave") {
      this.hay_mensaje = true;
      this.texto_mensaje =
        "Su contraseña ha sido restablecida, inicie sesion con la nueva clave";
      this.clase = "alert alert-success";
    }
  }
};
</script>

<style>
.card {
  width: 100% !important;
}
.text-black {
  color: black;
}
</style>
