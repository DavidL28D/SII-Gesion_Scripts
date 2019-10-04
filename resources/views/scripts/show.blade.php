@extends('main')
@section('title', 'Detalles del Script')
@section('content')

<div class="row">

    <div class="col-md-4 text-center">
        <h1 class="text-center">Detalles del Script</h1>
        <br>
        <p class="text-center">A continuacion se muestra una informacion detalla del script seleccionado, haz clic en los botones correspondientes para modificarlos o eliminarlos.</p>
        <a href="{{ route('scripts.index') }}" class="btn btn-primary btn-block" >Atrás</a>

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

                            
                            <h2>General</h2>

                            <h5>Nombre</h5>
                            <p>{{$script->nombre}}</p>

                            <?php
                            if($script->argumentos != null){
                                echo"<h5>Argumentos</h5>";
                                echo"<p>{{$script->argumentos}}</p>";
                            }
                            ?>
                            
                            <?php
                            if($script->retorno != null){
                                echo"<h5>Retorno</h5>";
                                echo"<p>{{$script->retorno}}</p>";
                            }
                            ?>

                            <h5>Descripion</h5>
                            <p>{{$script->descripcion}}</p>

                            <h5>Permisos</h5>
                            <p>{{$script->permisos}}</p>

                            <h5>Creacion</h5>
                            <p>{{$script->creacion}}</p>

                            <hr>
                            <h3>Sistemas Operativos</h3>
                            <p>{{$sos->nombre}}</p>

                            <hr>
                            <h3>Recursos</h3>
                            <p>{{$resources->nombre}}</p>
                            
                                <tr>
                                    <td><a class="btn btn-success btn-xs btn-block" href="{{action('ScriptController@edit', $script)}}" ><span class="glyphicon glyphicon-pencil">Editar</span></a></td>
                                    <td>
                                    <form action="{{action('ScriptController@destroy', $script)}}" method="post">
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