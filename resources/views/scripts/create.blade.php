@extends('main')
@section('title', 'Crear Script')
@section('content')

<div class="row">

    <div class="col-md-4 text-center">
    
        <h1 class="text-center">Creacion de Scripts</h1>
        <br>
        <p class="text-center">A continuacion se solicitan diversos datos necesarios para la creacion de un nuevo script en el sistema.</p>
        <p class="text-center"><b>Datos marcados con * son obligatorios</b></p>
        <a href="{{ route('scripts.index') }}" class="btn btn-primary btn-block" >Atrás</a>
        
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

        <form method="POST" action="{{ route('scripts.store') }}"  role="form">

            @csrf
            <br>

            <ul class="nav nav-tabs" id="myTab" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">* General</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="so_info-tab" data-toggle="tab" href="#so_info" role="tab" aria-controls="so_info" aria-selected="false">* SO's</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="resource_info-tab" data-toggle="tab" href="#resource_info" role="tab" aria-controls="resource_info" aria-selected="false">Recursos</a>
                </li>

            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">

                    <br>

                    <div class="form-group">
                        <label for="label_nombre">* Nombre del Script</label>
                        <input type="text" name="nombre" id="label_nombre" class="form-control input-sm" placeholder="Ingresa el nombre del script.">
                    </div>
                    
                    <div class="form-group input-sm">
                        <label for="FormControlSelectLenguajes">* Lenguaje</label>
                        <select class="form-control" id="FormControlSelectLenguajes" name="lenguaje_id">
                        <option value="">Eliga un lenguaje</option>
                        @foreach($lenguajes as $lenguaje)
                            <option value="{{ $lenguaje['id'] }}">{{ $lenguaje['nombre'] }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="label_argumentos">Argumentos</label>
                        <input type="text" name="argumentos" id="label_argumentos" class="form-control input-sm" placeholder="Ingresa los argumentos que recibe el script.">
                    </div>

                    <div class="form-group">
                        <label for="label_retorno">Retorno</label>
                        <input type="text" name="retorno" id="label_retorno" class="form-control input-sm" placeholder="Ingresa la informacion de retorno del script.">
                    </div>

                    <div class="form-group">
                        <label for="label_descripcion">* Descripcion</label>
                        <input type="text" name="descripcion" id="label_descripcion" class="form-control input-sm" placeholder="Ingresa una breve descripcion del script.">
                    </div>

                    <div class="form-group input-sm">
                        <label for="FormControlSelectPermisos">* Permisos del scritps</label>
                        <select class="form-control" id="FormControlSelectPermisos" name="permisos">
                        <option value="">Seleccione los permisos</option>
                        <option value="---">---</option>
                        <option value="--x">--x</option>
                        <option value="-w-">-w-</option>
                        <option value="-wx">-wx</option>
                        <option value="r--">r--</option>
                        <option value="r-x">r-x</option>
                        <option value="rw-">rw-</option>
                        <option value="rwx">rwx</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="label_creacion">* Creacion</label>
                        <input type="date" name="creacion" id="label_creacion" class="form-control input-sm" placeholder="Ingresa la informacion de retorno del script">
                    </div>

                    <div class="form-group input-sm">
                        <label for="FormControlSelectEmpresas">Empresa</label>
                        <select class="form-control" id="FormControlSelectEmpresas" name="empresa_id">
                        <option value="">Sin Empresa</option>
                        @foreach($empresas as $empresa)
                            <option value="{{ $empresa['id'] }}">{{ $empresa['nombre'] }}</option>
                        @endforeach
                        </select>
                    </div>

                </div>
                
                <div class="tab-pane fade" id="so_info" role="tabpanel" aria-labelledby="so_info-tab">

                    <br>
                    <!--
                    <div class="form-group input-sm">
                        <label for="FormControlSelectaSo_Info">* Sistema Operativo en el cual se ejecuta</label>
                        <select class="form-control" id="FormControlSelectaSo_Info" name="so_id">
                        <option value="">Seleccione un sistema operativo</option>
                        @foreach($sos as $s)
                            <option value="{{ $s['id'] }}">{{ $s['nombre'] }}</option>
                        @endforeach
                        </select>
                    </div>
                    -->

                    <div class="form-group input-sm">
                        <label for="FormControlSelectaSo_Info">* Sistema(s) Operativo(s) en el cual se ejecuta</label>
                        <label for="FormControlSelectaSo_Info">Para seleccionar varios SOs mantener presionado Ctrl y seleccionar con un click</label>
                        <select class="custom-select" id="FormControlSelectaSo_Info" name="so_id" multiple>
                            @foreach($sos as $s)
                                <option value="{{ $s['id'] }}">{{ $s['nombre'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    
                </div>

                <div class="tab-pane fade" id="resource_info" role="tabpanel" aria-labelledby="resource_info-tab">

                    <br>
                    <div class="form-group input-sm">
                        <label for="FormControlSelectaResource_Info">Recursos que emplea</label>
                        <select class="custom-select" id="FormControlSelectaResource_Info" name="recurso_id" multiple>
                        <option value="">Sin recursos</option>
                        @foreach($recursos as $recurso)
                            <option value="{{ $recurso['id'] }}">{{ $recurso['nombre'] }}</option>
                        @endforeach
                        </select>
                    </div>

                </div>

            </div>
                <button type="submit" class="btn btn-success ">Guardar</button>
        </form>
    
    </div>
</div>

@endsection
