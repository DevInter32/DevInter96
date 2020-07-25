@extends('layouts.base')

@section('extra_header')

<style>
	body{
		background-color: #fff!important;
	}
</style>

@endsection

@section('cabecera')
	<cabecera-component></cabecera-component>
@endsection
@section('contenido')
<link rel="stylesheet" href="css/main.css">

	@auth
		<router-view mensaje="{{$mensaje}}" user_id="{{Auth::user()->id}}"></router-view>
	@else
		<router-view mensaje="{{$mensaje}}"></router-view>

	@endauth

@endsection
