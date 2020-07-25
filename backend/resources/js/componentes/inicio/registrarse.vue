<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Registrarse</div>

          <div class="card-body">
            <form method="POST" @submit.prevent="registrarse">
              <validation-errors
                :errors="validationErrors"
                v-if="validationErrors"
              ></validation-errors>

              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right"
                  >Nombre</label
                >

                <div class="col-md-6">
                  <input
                    id="name"
                    type="text"
                    class="form-control"
                    name="name"
                    v-model="nombre"
                    required
                    autocomplete="name"
                    autofocus
                  />
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right"
                  >Direccion de correo</label
                >

                <div class="col-md-6">
                  <input
                    id="email"
                    type="email"
                    class="form-control"
                    name="email"
                    v-model="correo"
                    required
                    autocomplete="email"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="password"
                  class="col-md-4 col-form-label text-md-right"
                  >Contraseña</label
                >

                <div class="col-md-6">
                  <input
                    id="password"
                    type="password"
                    class="form-control"
                    name="password"
                    required
                    autocomplete="new-password"
                    v-model="clave"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="password-confirm"
                  class="col-md-4 col-form-label text-md-right"
                  >Confrimar contraseña</label
                >

                <div class="col-md-6">
                  <input
                    id="password-confirm"
                    type="password"
                    class="form-control"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    v-model="clave_confirmacion"
                  />
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Registrarse
                  </button>
                </div>
              </div>
            </form>
          </div>
          <div class="mt-2 pt-3" v-if="cargando">
            <h3 class="text-center">Enviando correo de confirmacion</h3>

            <div class="row d-flex justify-content-center pt-3 pb-5">
              <div class="sk-chase">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      correo: "",
      clave: "",
      nombre: "",
      clave_confirmacion: "",
      validationErrors: "",
      cargando: false,
    };
  },
  methods: {
    registrarse() {
      const params = {
        //los coloco en ingles para usar el controlador del login que laravel trae por defecto
        email: this.correo,
        password: this.clave,
        name: this.nombre,
        password_confirmation: this.clave_confirmacion,
      };
      this.cargando = true;
      this.$alertify.success("Procesando peticion ... ");
      this.$http.post("register", params)
        .then((response) => {
          console.log(response)
          this.cargando = false;
          this.$alertify.success("Registro Completado");
          document.location.href = "http://127.0.0.1:8000/login";
        })
        .catch((error) => {
          this.cargando = false;
          this.$alertify.error("No se pudo hacer el registro");
          this.validationErrors = error.response.data.errors;
        });
    },
  },
};
</script>

<style></style>
