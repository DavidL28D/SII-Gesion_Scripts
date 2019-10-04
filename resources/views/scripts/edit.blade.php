@extends('main')
@section('title', 'Editar Lenguaje')
@section('content')

<div class="row">

    <div class="col-md-4 text-center">
        <h1 class="text-center">Modificacion del lenguaje</h1>
        <br>
        <p class="text-center">A continuacion se muestan diversos datos almacenados del lenguaje el cual se va a modificar, todos sus campos son modificables, sin embargo, recuerde que existen campos obligatorios.</p>
        <p class="text-center"><b>Datos marcados con * son obligatorios</b></p>
        <a href="{{ route('languages.index') }}" class="btn btn-primary btn-block" >Atrás</a>
        
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

        <form method="POST" action="{{ route('languages.update', $language) }}"  role="form">

            @csrf
            @method('PUT')

            <br><br>
            <div class="form-group">
                <label for="label_nombre">* Nombre del lenguaje</label>
                <input type="text" name="nombre" id="label_nombre" class="form-control input-sm" value="{{$language->nombre}}">
            </div>
            <div class="form-group">
                <label for="label_version">Version del lenguaje</label>
                <input type="text" name="version" id="label_version" class="form-control input-sm" value="{{$language->version}}">
            </div>
        
            <input type="submit"  value="Actualizar" class="btn btn-success">

        </form>

    </div>
</div>


@endsection
