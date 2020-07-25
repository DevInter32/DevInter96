<template>
  <div>
      <navInicio></navInicio>
      <inicio></inicio>
      <footerInicio></footerInicio>
  </div>
</template>

<script>

import navInicio from '@/componentes/nav/navInicio';
import footerInicio from '@/componentes/footer/footerInicio';
import inicio from '@/componentes/inicio/inicio';

export default {
    name:'Inicio',
    components:{
        navInicio,
        footerInicio,
        inicio,
    }
}
</script>

<style>

</style>