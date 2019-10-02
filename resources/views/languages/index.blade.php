@extends('main')
@section('title', 'Listado de lenguajes')
@section('content')

<div class="row">

    <div class="col-md-4 text-center">
        <h1 class="text-center">Listado de Lenguaje(s)</h1>
        <br>
        <p class="text-center">A continuacion se muestra una lista con los diversos lenguajes almacenados, haz clic en los botones correspondientes para ver en detalle, modificarlos o eliminarlos.</p>
        <a href="/" class="btn btn-primary btn-block" >Atrás</a>
        
    </div>

    <div class="col-md 6 col-md-offset-2">

        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                <div class="panel-body">
                <div class="pull-right">
                    <div class="btn-group">
                    <a href="{{ route('languages.create') }}" class="btn btn-success" >Añadir Lenguaje</a>
                    </div>
                </div>
                <br>
                <div class="table-container">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>Nombre</th>
                            <th>Detalles</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>

                        <tbody>
                            @if($languages->count())  
                                @foreach($languages as $language)  
                                <tr>
                                    <td>{{$language->nombre}}</td>
                                    <td><a class="btn btn-secondary btn-xs" href="{{action('LanguageController@show', $language)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                    <td><a class="btn btn-primary btn-xs" href="{{action('LanguageController@edit', $language)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                    <td>
                                    <form action="{{action('LanguageController@destroy', $language->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input name="_method" type="hidden" value="DELETE">
                    
                                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>
                                @endforeach 

                            @else
                                <tr>
                                    <td colspan="8">No hay registros!!</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
            {{ $languages->links() }}
            </div>
        </div>
        </section>
    </div>
</div>

@endsection