<template>
  <div>
    <navInicio></navInicio><br /><br />
    <contacto></contacto>
    <footerInicio></footerInicio>
  </div>
</template>

<script>
import navInicio from "@/componentes/nav/navInicio";
import footerInicio from '@/componentes/footer/footerInicio';
import contacto from '@/componentes/inicio/contacto';

export default {
  name: "Contacto",
  components: {
    navInicio,
    footerInicio,
    contacto,
  },
};
</script>

<style scoped>
.logoL1,
.logoL2 {
  font-weight: bold;
}
.ll1 {
  font-size: 170%;
}
.logoL1 {
  color: #858688;
}
.logoL2 {
  color: #00b6ff;
}

/*body {background:url(https://data.bancodedatos.cf/img/group?cdn=2521&select=3);background-position:fixed;}*/
* {
  margin: 0;
}
body {
  background-color: #eee;
}
.panel-title {
  font-size: 2em;
}
.panel-login1 {
  margin-top: 0.5%;
}

.panel-login2 {
  margin-top: 5%;
  border-radius: 5px;
  padding: 2%;
  border: 2px solid black;
}

.footer-copyright {
  text-align: right;
}

.socicon {
  font-size: 230%;
}
.socicon:hover {
  font-size: 250%;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
  text-decoration: none;
}
.form-control {
  width: 75%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 3px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
  border-radius: 5px;
  resize: none;
  font-size: 1em;
}
.form-control:focus {
  border: 3px solid #555;
}

@media screen and (max-width: 700px) {
  .form-control {
    width: 100%;
  }
}

.panel-body {
  color: black;
  font-size: 1em;
}

.panel-body h4 {
  margin: 5% 0;
}
.panel-body a {
  margin: 0 2%;
}
#btn {
  width: 75%;
  background-color: #ccc;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5;
  font-size: 1.1em;
}

@media screen and (max-width: 700px) {
  #btn {
    width: 100%;
  }
}

#btn:hover {
  background-color: black;
}
.footer {
  top: 90%;
}
</style>
