@extends('main')
@section('title', 'Detalles del Recurso')
@section('content')

<div class="row">

    <div class="col-md-4 text-center">
        <br><br>
        <h1 class="text-center">Detalles del Recurso</h1>
        <br>
        <p class="text-center">A continuacion se muestra una informacion detalla del recurso seleccionado, haz clic en los botones correspondientes para modificarlos o eliminarlos.</p>
        <a href="{{ route('resources.index') }}" class="btn btn-primary btn-block" >Atrás</a>

    </div>

    <div class="col-md 6 col-md-offset-2">

        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                <div class="panel-body">
                <br>
                <div class="table-container">
                    <table id="mytable" class="table table-bordred table-striped">
                      
                        <tbody>

                                    <h4>Nombre</h4>
                                    <p>{{$resource->nombre}}</p>
                                    <h4>Version</h4>
                                    <p>{{$resource->version}}</p>
                                    <h4>Tipo</h4>
                                    <?php 
                                    if($resource->tipo == 1){
                                        echo "<p>Otro</p>";
                                    }else if($resource->tipo == 2){
                                        echo "<p>Libreria</p>";
                                    }else if($resource->tipo == 3){
                                        echo "<p>Modulo</p>";
                                    }
                                    ?>
                                    <h4>Descripcion</h4>
                                    <p>{{$resource->descripcion}}</p>
                                    
                                <tr>
                                    <td><a class="btn btn-success btn-xs btn-block" href="{{action('ResourceController@edit', $resource)}}" ><span class="glyphicon glyphicon-pencil">Editar</span></a></td>
                                    <td>
                                    <form action="{{action('ResourceController@destroy', $resource->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-xs btn-block" type="submit">Eliminar<span class="glyphicon glyphicon-trash"></span></button>
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