<template>
  <div id="contenido">
    <div class="mi_fondo_blog">
      <div
        class="imagen_fondo_blog"
        style="background-image: url(img/developer-001.jpg);"
      >
        <div
          class="contenido-centro flex justify-content-center align-items-center pt-5"
        >
          <h1 class="text-white pt-5">Blog</h1>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row d-flex justify-content-center mt-5 pt-3" v-if="cargando">
        <div class="sk-chase">
          <div class="sk-chase-dot"></div>
          <div class="sk-chase-dot"></div>
          <div class="sk-chase-dot"></div>
          <div class="sk-chase-dot"></div>
          <div class="sk-chase-dot"></div>
          <div class="sk-chase-dot"></div>
        </div>
      </div>

      <div class="row" v-else>
        <div class="col-md-8">
          <br />
          <br />
          <entrada
            v-for="entrada in entradas"
            :entrada="entrada"
            :key="entrada.id"
          ></entrada>

          <!--Paginador-->

          <div class="d-flex justify-content-center" id="paginate">
            <nav aria-label="Page Navigation d-flex">
              <ul class="pagination text-align-center">
                <li :class="anterior_class" @click="anterior_pagina">
                  <a class="page-link">&laquo;</a>
                </li>

                <li
                  v-for="(n, i) in ultima_pagina"
                  :class="clase_paginador(i)"
                  @click="cambiar_pagina(i)"
                  :key="i"
                >
                  <a class="page-link">{{ i + 1 }}</a>
                </li>

                <li :class="siguiente_class" @click="proxima_pagina">
                  <a class="page-link">&raquo;</a>
                </li>
              </ul>
            </nav>
          </div>

          <!-- fin de paginador-->
        </div>

        <div class="col-md-4">
          <br />
          <br />
          <div class="card">
            <h5 class="mt-3 text-center">Entradas mas destacadas</h5>
            <div class="card-body">
              <entradaDestacada
                class="my-2 mb-4"
                v-for="entrada in entradas_mas_vistas"
                :entrada="entrada"
                :key="entrada.ion - disc"
              ></entradaDestacada>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
//Vuex
import {mapActions} from 'vuex';
//Entradas
import entradaDestacada from "@/componentes/blog/entradaDestacada";
import entrada from '@/componentes/blog/entrada';

export default {
  components: {
    entradaDestacada,
    entrada,
  },
  data() {
    return {
      entradas: [],
      entradas_mas_vistas: [],
      pagina_actual: 1,
      ultima_pagina: 3,
      anterior_class: "page-item",
      siguiente_class: "page-item",
      cargando: false,
    };
  },
  mounted() {
    this.obtenerEntradas();
  },
  methods: {
    ...mapActions(['cargarEntradas']),
    async obtenerEntradas() {

      this.entradas = [];
      this.cargando = true;

      try{

        const response = await this.cargarEntradas(this.pagina_actual);

        console.log("Response ", response)
        this.cargando = false;
        this.ultima_pagina = response.entradas.last_page;

        if (this.pagina_actual <= 1) {
          this.anterior_class = "page-item disabled";
        } else {
          this.anterior_class = "page-item";
        }

        if (this.pagina_actual == this.ultima_pagina) {
          this.siguiente_class = "page-item disabled";
        } else {
          this.siguiente_class = "page-item";
        }

        this.entradas = response.entradas.data;
        this.entradas_mas_vistas = response.entradas_mas_vistas;

        this.cambiar_formato_fecha();

      } catch(error){
        console.log("Error en obtener entradas ", error)
      }

    },
    clase_paginador(n) {
      var pagina = n + 1;
      if (pagina == this.pagina_actual) {
        return "page-item active";
      } else {
        return "page-item";
      }
    },
    proxima_pagina() {
      this.pagina_actual = this.pagina_actual + 1;
      this.obtenerEntradas();
    },
    anterior_pagina() {
      if (this.pagina_actual > 1) {
        this.pagina_actual = this.pagina_actual - 1;
        this.obtenerEntradas();
      }
    },
    cambiar_pagina(n) {
      var pagina = n + 1;
      this.pagina_actual = pagina;
      this.clase_paginador(n);
      this.obtenerEntradas();
    },
    cambiar_formato_fecha() {
      this.entradas.forEach((entrada) => {
        entrada.created_at = entrada.created_at.replace("-", " ");
        entrada.created_at = entrada.created_at.replace("-", " ");
        var dia = entrada.created_at.split(" ")[0];
        var mes = entrada.created_at.split(" ")[1];
        //var year = entrada.created_at.split(" ")[2];

        if (mes == "Dec") {
          mes = "Dic";
        } else if (mes == "Nov") {
          mes = "Nov";
        } else if (mes == "Aug") {
          mes = "Ago";
        } else if (mes == "Apr") {
          mes = "Abr";
        }

        entrada.dia = dia;
        entrada.mes = mes;
      });

      this.entradas_mas_vistas.forEach((entrada) => {
        entrada.created_at = entrada.created_at.replace("-", " ");
        entrada.created_at = entrada.created_at.replace("-", " ");
        var dia = entrada.created_at.split(" ")[0];
        var mes = entrada.created_at.split(" ")[1];
        var year = entrada.created_at.split(" ")[2];

        if (mes == "Dec") {
          mes = "Dic";
        } else if (mes == "Nov") {
          mes = "Nov";
        } else if (mes == "Aug") {
          mes = "Ago";
        } else if (mes == "Apr") {
          mes = "Abr";
        }

        entrada.dia = dia;
        entrada.mes = mes;
        entrada.year = year;
      });
    },
  },
};
</script>

<style>
.mi_fondo_blog {
  height: 300px;
  position: static;
  width: 100%;
  top: 2em;
}

.imagen_fondo_blog {
  background-size: cover;

  background-repeat: no-repeat;

  margin-bottom: 30px;

  background-position: center;

  overflow: hidden;
  height: 100%;
  width: 100%;
}

.contenido-centro {
  text-align: center;

  height: 100%;

  background: rgba(0, 0, 0, 0.6);

  -webkit-transition: 0.5s;

  -moz-transition: 0.5s;

  -o-transition: 0.5s;

  transition: 0.5s;

  position: relative;
}

.descripcion img {
  display: none;
}

.page-item {
  color: blue;
  cursor: pointer;
}
.page-item.disabled {
  cursor: auto;
}

/*CODIGO PARA EL SPINNER */

.sk-chase {
  width: 40px;
  height: 40px;
  position: relative;
  animation: sk-chase 2.5s infinite linear both;
}

.sk-chase-dot {
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
  animation: sk-chase-dot 2s infinite ease-in-out both;
}

.sk-chase-dot:before {
  content: "";
  display: block;
  width: 25%;
  height: 25%;
  background-color: #000;
  border-radius: 100%;
  animation: sk-chase-dot-before 2s infinite ease-in-out both;
}

.sk-chase-dot:nth-child(1) {
  animation-delay: -1.1s;
}
.sk-chase-dot:nth-child(2) {
  animation-delay: -1s;
}
.sk-chase-dot:nth-child(3) {
  animation-delay: -0.9s;
}
.sk-chase-dot:nth-child(4) {
  animation-delay: -0.8s;
}
.sk-chase-dot:nth-child(5) {
  animation-delay: -0.7s;
}
.sk-chase-dot:nth-child(6) {
  animation-delay: -0.6s;
}
.sk-chase-dot:nth-child(1):before {
  animation-delay: -1.1s;
}
.sk-chase-dot:nth-child(2):before {
  animation-delay: -1s;
}
.sk-chase-dot:nth-child(3):before {
  animation-delay: -0.9s;
}
.sk-chase-dot:nth-child(4):before {
  animation-delay: -0.8s;
}
.sk-chase-dot:nth-child(5):before {
  animation-delay: -0.7s;
}
.sk-chase-dot:nth-child(6):before {
  animation-delay: -0.6s;
}

@keyframes sk-chase {
  100% {
    transform: rotate(360deg);
  }
}

@keyframes sk-chase-dot {
  80%,
  100% {
    transform: rotate(360deg);
  }
}

@keyframes sk-chase-dot-before {
  50% {
    transform: scale(0.4);
  }
  100%,
  0% {
    transform: scale(1);
  }
}

/* FIN DE CODIGO PARA EL SPINNER */
</style>
