@extends('main')
@section('title', 'Detalles de la empresa')
@section('content')

<div class="row">

    <div class="col-md-4 text-center">
        <br><br>
        <h1 class="text-center">Detalles de la empresa</h1>
        <br>
        <p class="text-center">A continuacion se muestra una informacion detalla de la empresa seleccionada, haz clic en los botones correspondientes para modificarlos o eliminarlos.</p>
        <a href="{{ route('companies.index') }}" class="btn btn-primary btn-block" >Atrás</a>

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
                            <p>{{$company->nombre}}</p>
                            <h4>Direccion</h4>
                            <p>{{$company->direccion}}</p>
                            <h4>Telefono</h4>
                            <p>{{$company->telefono}}</p>
                            <?php
                            if($company->descripcion != null){
                                echo"<h4>Descripcion</h4>";
                                echo"<p>{{$company->descripcion}}</p>";
                            }
                            ?>
                            
                            <tr>
                                <td><a class="btn btn-success btn-xs btn-block" href="{{action('CompanyController@edit', $company)}}" ><span class="glyphicon glyphicon-pencil">Editar</span></a></td>
                                <td>
                                <form action="{{action('CompanyController@destroy', $company->id)}}" method="post">
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