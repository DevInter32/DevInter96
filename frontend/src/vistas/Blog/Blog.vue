<template>
  <div>
      <navInicio></navInicio><br><br>
      <blog></blog>
      <footerInicio></footerInicio>
  </div>
</template>

<script>

import navInicio from '@/componentes/nav/navInicio';
import footerInicio from '@/componentes/footer/footerInicio';
import blog from '@/componentes/inicio/blog';

export default {
    name:'Blog',
    components:{
        navInicio,
        footerInicio,
        blog,
    }
}
</script>

<style>

</style>