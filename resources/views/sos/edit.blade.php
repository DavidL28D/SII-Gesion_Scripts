@extends('main')
@section('title', 'Editar SO')
@section('content')

<div class="row">

    <div class="col-md-4 text-center">
        <h1 class="text-center">Modificacion del SO</h1>
        <br>
        <p class="text-center">A continuacion se muestan diversos datos almacenados del sistema operativo el cual se va a modificar, todos sus campos son modificables, sin embargo, recuerde que existen campos obligatorios.</p>
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

        <form method="POST" action="{{ route('sos.update', $so) }}"  role="form">

            @csrf
            @method('PUT')

            <br><br>
            <div class="form-group">
                <label for="label_nombre">* Nombre del Sistema Operativo</label>
                <input type="text" name="nombre" id="label_nombre" class="form-control input-sm" value="{{$so->nombre}}">
            </div>

            <div class="form-group">
                <label for="label_version">* Version del Sistema Operativo</label>
                <input type="text" name="version" id="label_version" class="form-control input-sm" value="{{$so->version}}">
            </div>

            <div class="form-group">
                <label for="label_compilacion">* Compilacion</label>
                <input type="text" name="compilacion" id="label_compilacion" class="form-control input-sm" value="{{$so->compilacion}}">
            </div>

            <div class="form-group">
                <label for="label_descripcion">Descripcion del Sistema Operativo</label>
                <input type="text" name="descripcion" id="label_descripcion" class="form-control input-sm" value="{{$so->descripcion}}">
            </div>
        
            <input type="submit"  value="Actualizar" class="btn btn-success">

        </form>

    </div>
</div>


@endsection
