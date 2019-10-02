@extends('main')
@section('title', 'Detalles del lenguaje')
@section('content')

<div class="row">

    <div class="col-md-4 text-center">
        <h1 class="text-center">Detalles del Lenguaje</h1>
        <br>
        <p class="text-center">A continuacion se muestra una informacion detalla del lenguaje seleccionado, haz clic en los botones correspondientes para modificarlos o eliminarlos.</p>
        <a href="{{ route('languages.index') }}" class="btn btn-primary btn-block" >Atrás</a>

    </div>

    <div class="col-md 6 col-md-offset-2">

        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                <div class="panel-body">
                <br>
                <div class="table-container">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>Nombre</th>
                            <th>Version</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>

                        <tbody>
                            
                                <tr>
                                    <td>{{$language->nombre}}</td>
                                    <td>{{$language->version}}</td>
                                    <td><a class="btn btn-primary btn-xs" href="{{action('LanguageController@edit', $language)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                    <td>
                                    <form action="{{action('LanguageController@destroy', $language->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
        </section>
    </div>
</div>

@endsection