@extends('main')
@section('title', 'Crear Recurso')
@section('content')

<div class="row">

    <div class="col-md-4 text-center">
        <h1 class="text-center">Creacion de Recursos</h1>
        <br>
        <p class="text-center">A continuacion se solicitan diversos datos necesarios para la creacion de un nuevo recurso en el sistema.</p>
        <p class="text-center"><b>Datos marcados con * son obligatorios</b></p>
        <a href="{{ route('resources.index') }}" class="btn btn-primary btn-block" >Atrás</a>
        
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

        <form method="POST" action="{{ route('resources.store') }}"  role="form">
        @csrf
        <br>
            <div class="form-group">
                <label for="label_nombre">* Nombre del Recurso</label>
                <input type="text" name="nombre" id="label_nombre" class="form-control input-sm" placeholder="Ingresa el nombre del recurso.">
            </div>

            <div class="form-group">
                <label for="label_version">* Version del Recurso</label>
                <input type="text" name="version" id="label_version" class="form-control input-sm" placeholder="Ingresa la version del recurso.">
            </div>

            <div class="form-group input-sm">
                <label for="FormControlSelect">* Tipo</label>
                <select class="form-control" id="FormControlSelect" name="tipo">
                <option value=1>Otro</option>
                <option value=2>Libreria</option>
                <option value=3>Modulo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="label_descripcion">Descripcion del Recurso</label>
                <input type="text" name="descripcion" id="label_descripcion" class="form-control input-sm" placeholder="Ingresa una descripcion del recurso.">
            </div>
        
            <button type="submit" class="btn btn-success ">Guardar</button>
        </form>
    
    </div>
</div>


@endsection
