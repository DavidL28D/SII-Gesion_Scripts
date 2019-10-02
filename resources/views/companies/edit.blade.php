@extends('main')
@section('title', 'Editar Empresa')
@section('content')

<div class="row">

    <div class="col-md-4 text-center">
        <h1 class="text-center">Modificacion de la empresa</h1>
        <br>
        <p class="text-center">A continuacion se muestan diversos datos almacenados de la empresa la cual se va a modificar, todos sus campos son modificables, sin embargo, recuerde que existen campos obligatorios.</p>
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

        <form method="POST" action="{{ route('companies.update', $company) }}"  role="form">

            @csrf
            @method('PUT')

            <br><br>
            <div class="form-group">
                <label for="label_nombre">* Nombre de la empresa</label>
                <input type="text" name="nombre" id="label_nombre" class="form-control input-sm" value="{{$company->nombre}}">
            </div>

            <div class="form-group">
                <label for="label_direccion">* Direccion de la empresa</label>
                <input type="text" name="direccion" id="label_direccion" class="form-control input-sm" value="{{$company->direccion}}">
            </div>

            <div class="form-group">
                <label for="label_telefono">* Numero telefonico de la empresa</label>
                <input type="text" name="telefono" id="label_telefono" class="form-control input-sm" value="{{$company->telefono}}">
            </div>

            <div class="form-group">
                <label for="label_descripcion">Descripcion de la empresa</label>
                <input type="text" name="descripcion" id="label_descripcion" class="form-control input-sm" value="{{$company->descripcion}}">
            </div>
        
            <input type="submit"  value="Actualizar" class="btn btn-success">

        </form>

    </div>
</div>


@endsection
