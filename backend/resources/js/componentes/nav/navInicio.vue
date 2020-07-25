<template>
  <header>
    <router-link to="/">
      <h1>
        Dev
        <b>Inter</b>
      </h1>
    </router-link>

    <input type="checkbox" id="menu-bar" />

    <label class="icon-menu" for="menu-bar"></label>

    <nav class="menu_dev">
      <router-link to="/blog" class="item medio">Blog</router-link>

      <router-link to="/contacto" class="item medio">Contacto</router-link>
      <router-link
        v-if="!token"
        to="/login"
        class="item medio"
        :style="{padding:'7px'}"
      >Iniciar Sesión</router-link>
      <router-link v-if="!token" to="/register" class="item medio">Registrarse</router-link>

      <div v-if="token" class="dropdown">
        <a
          class="dropdown-toggle dropbtn text-white item medio"
          id="dropdownMenuButton"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >{{usuario.nombre}}</a>
        <div class="dropdown-content btn bg-dark btn-block p-0">
          <router-link to="/perfil" class="btn bg-dark text-white btn-block btn_dropdown">Mi perfil</router-link>
          <a @click="logout()" class="btn bg-dark text-white btn-block btn_dropdown">Cerrar sesion</a>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
import { mapActions } from "vuex";
import testLog from "../../middleware/testLog";
import axios from "axios";
let token = localStorage.getItem("token")
  ? JSON.parse(localStorage.getItem("token"))
  : false;
token = token != "undefined" ? token : false;
export default {
  name: "navInicio",

  data: () => {
    return {
      token: false,
      usuario: {
        nombre: false
      }
    };
  },
  created() {
    if (localStorage.getItem("token")) {
      // console.log(token);
      console.log(localStorage.getItem("token"));
      this.$data.token = localStorage.getItem("token");
      axios.post(`http://127.0.0.1:8000/api/perfil?token=${token}`).then(
        response =>
          //console.log(response))
          (this.usuario = response.data.success)
      );
      //console.log(`Mi token es: ${token}`);
    }
    console.log(token);

    // console.log(token);
  },
  methods: {
    // ...mapActions(["iniciarSesion", "cerrarSesion"]),
    logout() {
      localStorage.clear();
      this.$router.push("login");

      console.log("se cerro la session");
    }
  }
};
</script>

<style  scoped>
.pointer {
  cursor: pointer;
}

.dropdown-toggle::after {
  margin-top: 10px;
}

.dropbtn {
  cursor: pointer;
  height: auto;
}

.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  /*position: absolute;
        width: 100%;
        min-width:160px;
        top: 30px;
        right: -20px;*/

  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.menu_dev a.btn_dropdown:hover {
  background-color: #38c6d8 !important;
}

@media (max-width: 699px) {
  .dropdown {
    display: block;
    margin-right: 0px;
  }
}
@media (min-width: 700px) {
  .dropdown {
    display: inline-block;
  }
}
</style>
