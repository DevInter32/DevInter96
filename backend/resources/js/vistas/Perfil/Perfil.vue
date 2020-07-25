<template>
  <div>
    <navInicio></navInicio>
    <br />
    <br />
    <br />
    <PerfilComponent></PerfilComponent>
    <footerInicio></footerInicio>
  </div>
</template>

<script>
import navInicio from "@/componentes/nav/navInicio";
import footerInicio from "@/componentes/footer/footerInicio";
import PerfilComponent from "@/componentes/PerfilComponent";
export default {
  name: "Perfil",
  components: {
    navInicio,
    footerInicio,
    PerfilComponent
  }
};
</script>