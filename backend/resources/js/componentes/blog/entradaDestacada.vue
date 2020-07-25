<template>
	<div class="d-flex row">
		<router-link  :to="pagina" class="img_destacados col-4">
			<img :src="imagen" alt="" class="img-fluid rounded ">
		</router-link>

		<div class="col-8" >


			<router-link :to="pagina"><h5>{{entrada.titulo}}</h5></router-link>
			<span>{{entrada.dia}}   {{entrada.mes}} ,{{entrada.year}}</span>
		</div>
	</div>

</template>

<script>
	export default{
		props:{
			entrada:Object
		},
		data(){
			return{
				imagen:'',
				pagina:'',
				id:''
			}
		},
		created(){
			this.id = this.entrada.id;
			this.imagen='storage/img/entradas/'  + this.entrada.img_vista_previa;
			this.pagina='entradas/'+this.entrada.id
		},
	}
</script>

<style>
	.img_destacados{
	width: 100%;
	height: 100%;
	}
</style>