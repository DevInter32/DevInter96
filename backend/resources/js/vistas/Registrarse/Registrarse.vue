<template>
  <div>
      <navInicio></navInicio><br><br><br><br>
      <registrarse></registrarse>
  </div>
</template>

<script>

import navInicio from '@/componentes/nav/navInicio';
import footerInicio from '@/componentes/footer/footerInicio';
import registrarse from '@/componentes/inicio/registrarse';

export default {
    name:'Registrarse',
    components:{
        navInicio,
        footerInicio,
        registrarse,
    }
}
</script>

<style>

</style>