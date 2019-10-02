@extends('main')
@section('title', 'Crear SO')
@section('content')

<div class="row">

    <div class="col-md-4 text-center">
        <h1 class="text-center">Creacion de Sistemas Operativos</h1>
        <br>
        <p class="text-center">A continuacion se solicitan diversos datos necesarios para la creacion de un nuevo sistema operativo en el sistema.</p>
        <p class="text-center"><b>Datos marcados con * son obligatorios</b></p>
        <a href="{{ route('sos.index') }}" class="btn btn-primary btn-block" >Atrás</a>
        
    </div>

    <div class="col-md 6 col-md-offset-2">

        @if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
        
		@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
		@endif

        <form method="POST" action="{{ route('sos.store') }}"  role="form">
        @csrf
        <br>
            <div class="form-group">
                <label for="label_nombre">* Nombre del Sistema Operativo</label>
                <input type="text" name="nombre" id="label_nombre" class="form-control input-sm" placeholder="Ingresa el nombre del SO.">
            </div>

            <div class="form-group">
                <label for="label_version">* Version del Sistema Operativo</label>
                <input type="text" name="version" id="label_version" class="form-control input-sm" placeholder="Ingresa la version del SO.">
            </div>

            <div class="form-group">
                <label for="label_compilacion">* Compilacion</label>
                <input type="text" name="compilacion" id="label_compilacion" class="form-control input-sm" placeholder="Ingresa la compilacion del SO.">
            </div>

            <div class="form-group">
                <label for="label_descripcion">Descripcion del Sistema Operativo</label>
                <input type="text" name="descripcion" id="label_descripcion" class="form-control input-sm" placeholder="Ingresa una descripcion del SO.">
            </div>
        
            <button type="submit" class="btn btn-success ">Guardar</button>
        </form>
    
    </div>
</div>


@endsection
