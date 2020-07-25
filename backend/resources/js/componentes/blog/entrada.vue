<template>
  <div class="row">
    <div class="card">
      <router-link tag="a" :to="pagina" id="link_imagen" class="imagen-link">
        <div class="img_preview img-fluid p-relative">
          <img class="img_entry" :src="imagen" alt />
          <div class="blog_item_date text-white">
            <h3>{{entrada.dia}}</h3>
            <p>{{entrada.mes}}</p>
          </div>
        </div>
      </router-link>
      <div class="card-body">
        <router-link tag="a" :to="pagina" class="text-center title-link mt-2 mb-5">
          <h3>
            <b>{{entrada.titulo}}</b>
          </h3>
        </router-link>

        <div class="mb-1 descripcion" :id="id"></div>
        <ul class="blog-info-link">
          <li class="text-black autor">
            <i class="icon icon-user"></i>
            {{entrada.users.name}}
            <span class="text-black">|</span>
          </li>
          <li class="text-black autor">
            <i class="icon-comment"></i>
            {{entrada.comentarios_count}} comentarios
          </li>
        </ul>

        <br />
        <br />
      </div>
    </div>
  </div>
</template>

<script>

import $ from 'jquery';

export default {
  props: {
    entrada: Object
  },
  data() {
    return {
      imagen: "",
      pagina: "",
      id: ""
    };
  },
  created() {
    this.id = this.entrada.id;
    this.imagen = "storage/img/entradas/" + this.entrada.img_vista_previa;
    this.pagina = "entradas/" + this.entrada.id;
  },
  methods: {
    imprimir_etiquetas() {
      //var div = document.createElement("div");
      var descripcion = $("#" + this.id + ".descripcion");
      var p = document.createElement("p");

      descripcion.append(p);

      var contenido = this.entrada.descripcion;

      if (this.entrada.id == 54) {
        console.log("-------------contenido_completo------------");
        console.log(contenido);
        console.log("-------------contenido_completo------------");
      }
      p.innerHTML = contenido.substring(0, 450) + "...";
      let auxiliar_p = p.innerHTML;

      auxiliar_p = auxiliar_p.replace("<h1", "<p");
      auxiliar_p = auxiliar_p.replace("</h1", "</p");

      auxiliar_p = auxiliar_p.replace("<h2", "<p");
      auxiliar_p = auxiliar_p.replace("</h2", "</p");

      auxiliar_p = auxiliar_p.replace("<h3", "<p");
      auxiliar_p = auxiliar_p.replace("</h3", "</p");

      auxiliar_p = auxiliar_p.replace("<h4", "<p");
      auxiliar_p = auxiliar_p.replace("</h4", "</p");

      p.innerHTML = auxiliar_p;

      if (this.entrada.id == 54) {
        console.log(p);
      }
    }
  },
  mounted() {
    this.imprimir_etiquetas();
  }
};
</script>

<style scoped>
.imagen-link {
  height: 300px;
}
.card{
  width: 100% !important;
}
img.img_entry {
  height: 100%;
  width: 100%;
  border-radius: 10px 10px;
}
.p-relative {
  position: relative;
}

.blog_item_date {
  position: absolute;

  bottom: -270px;

  left: 10px;

  display: block;

  color: #fff;

  background: linear-gradient(
    90deg,
    rgba(3, 21, 54, 1) 0%,
    rgba(2, 46, 99, 1) 64%,
    rgba(3, 71, 139, 1) 100%
  );

  background: -moz-linear-gradient(
    90deg,
    rgba(3, 21, 54, 1) 0%,
    rgba(2, 46, 99, 1) 64%,
    rgba(3, 71, 139, 1) 100%
  );

  background: -webkit-linear-gradient(
    90deg,
    rgba(3, 21, 54, 1) 0%,
    rgba(2, 46, 99, 1) 64%,
    rgba(3, 71, 139, 1) 100%
  );
  background: -o-linear-gradient(
    90deg,
    rgba(3, 21, 54, 1) 0%,
    rgba(2, 46, 99, 1) 64%,
    rgba(3, 71, 139, 1) 100%
  );

  background: -ms-linear-gradient(
    90deg,
    rgba(3, 21, 54, 1) 0%,
    rgba(2, 46, 99, 1) 64%,
    rgba(3, 71, 139, 1) 100%
  );

  padding: 8px 30px;

  border-radius: 5px;
}

.tile-link {
  transform: all 0.3ms ease;
}

.title-link:hover {
  text-decoration: none;
}

.blog-info-link li {
  float: left;
  font-size: 14px;
  list-style: none;
}

.text-black {
  color: black;
}

.autor {
  opacity: 0.7;
}
</style>
