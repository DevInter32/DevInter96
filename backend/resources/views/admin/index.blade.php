@extends('layouts.admin')




@section('contenido')
    

<cabecera-admin-component usuario="{{Auth::user()->name}}"></cabecera-admin-component>

    



    <div class="row">
    	<div class="col-12">
    		<router-view></router-view>
    	</div>
    	
    </div>	

@endsection