@extends('main')
@section('title', 'Inicio')
@section('content')

<div class="row">

    <div class="col-md-7">
        <div class="jumbotron">
        <h1 class="display-4">Manejo de Scripts</h1>
        <p class="lead">Sistema automatizado en donde podras encontrar informacion y gestionar algunos de los scripts desarrollados, esta pagina se encuentra en construccion y algunas de sus funciones no estan completamente terminadas</p>
        <hr class="my-2">
        <h2>Administracion</h2>
        <br>
        <a class="btn btn-primary btn-md" href="" role="button">Gestion de Scripts</a>
        <br><br>
        <a class="btn btn-primary btn-md" href="/languages" role="button">Gestionar Lenguajes</a>
        <br><br>
        <a class="btn btn-primary btn-md" href="/sos" role="button">Gestionar Sistemas Operativos</a>
        <br><br>
        <a class="btn btn-primary btn-md" href="/resources" role="button">Gestionar Recursos</a>
        <br><br>
        <a class="btn btn-primary btn-md" href="/companies" role="button">Gestionar Empresas</a>
        </div>
    </div>

    <div class="col-md-4 col-md-offset-1">
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre de usuario</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su nombre de usuario">
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
            <small id="passwordHelp" class="form-text text-muted">Nunca compartas tu contraseña con alguien mas.</small>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar sesion</button>
        <button type="submit" class="btn btn-secondary">Registrase</button>
        </form>
    </div>
</div>

@endsection
