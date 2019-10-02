@extends('main')
@section('title', 'Crear Empresa')
@section('content')

<div class="row">

    <div class="col-md-4 text-center">
        <h1 class="text-center">Creacion de Empresa</h1>
        <br>
        <p class="text-center">A continuacion se solicitan diversos datos necesarios para la creacion de una nueva empresa en el sistema.</p>
        <p class="text-center"><b>Datos marcados con * son obligatorios</b></p>
        <a href="{{ route('companies.index') }}" class="btn btn-primary btn-block" >Atrás</a>
        
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

        <form method="POST" action="{{ route('companies.store') }}"  role="form">
        @csrf
        <br>
            <div class="form-group">
                <label for="label_nombre">* Nombre de la empresa</label>
                <input type="text" name="nombre" id="label_nombre" class="form-control input-sm" placeholder="Ingresa el nombre de la empresa.">
            </div>

            <div class="form-group">
                <label for="label_direccion">* Direccion de la empresa</label>
                <input type="text" name="direccion" id="label_direccion" class="form-control input-sm" placeholder="Ingresa la direccion de la empresa.">
            </div>

            <div class="form-group">
                <label for="label_telefono">* Numero telefonico de la empresa</label>
                <input type="text" name="telefono" id="label_telefono" class="form-control input-sm" placeholder="Ingresa el numero de la empresa.">
            </div>

            <div class="form-group">
                <label for="label_descripcion">Descripcion de la empresa</label>
                <input type="text" name="descripcion" id="label_descripcion" class="form-control input-sm" placeholder="Ingresa una descripcion de la empresa.">
            </div>
        
            <button type="submit" class="btn btn-success ">Guardar</button>
        </form>
    
    </div>
</div>


@endsection
