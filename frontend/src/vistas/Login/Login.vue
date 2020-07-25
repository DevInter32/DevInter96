<template>
  <div>
      <navInicio></navInicio><br><br>
      <login></login>
      <footerInicio></footerInicio>
  </div>
</template>

<script>

import navInicio from '@/componentes/nav/navInicio';
import footerInicio from '@/componentes/footer/footerInicio';
import login from '@/componentes/inicio/login';

export default {
    name:'Login',
    components:{
        navInicio,
        footerInicio,
        login,
    }
}
</script>

<style>

</style>