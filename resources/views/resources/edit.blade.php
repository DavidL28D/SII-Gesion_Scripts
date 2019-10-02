@extends('main')
@section('title', 'Editar Recurso')
@section('content')

<div class="row">

    <div class="col-md-4 text-center">
        <h1 class="text-center">Modificacion del Recurso</h1>
        <br>
        <p class="text-center">A continuacion se muestan diversos datos almacenados del recurso el cual se va a modificar, todos sus campos son modificables, sin embargo, recuerde que existen campos obligatorios.</p>
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

        <form method="POST" action="{{ route('resources.update', $resource) }}"  role="form">

            @csrf
            @method('PUT')

            <br><br>
            <div class="form-group">
                <label for="label_nombre">* Nombre del Recurso</label>
                <input type="text" name="nombre" id="label_nombre" class="form-control input-sm" value="{{$resource->nombre}}">
            </div>

            <div class="form-group">
                <label for="label_version">* Version del Recurso</label>
                <input type="text" name="version" id="label_version" class="form-control input-sm" value="{{$resource->version}}">
            </div>

            <div class="form-group input-sm">
                <label for="FormControlSelect">* Tipo</label>
                <select class="form-control" id="FormControlSelect" name="tipo">
                <option value=1 <?=(($resource->tipo==1)?"selected":"");?> >Otro</option>
                <option value=2 <?=(($resource->tipo==2)?"selected":"");?> >Libreria</option>
                <option value=3 <?=(($resource->tipo==3)?"selected":"");?> >Modulo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="label_descripcion">Descripcion del Recurso</label>
                <input type="text" name="descripcion" id="label_descripcion" class="form-control input-sm" value="{{$resource->descripcion}}">
            </div>
        
            <input type="submit"  value="Actualizar" class="btn btn-success">

        </form>

    </div>
</div>


@endsection
