<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" href="/">Scripts</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

        <li class="nav-item {{Request::is('/') ? 'active' : '' }}">
            <a class="nav-link" href="/">Incio <span class="sr-only"></span></a>
        </li>

        <li class="nav-item {{Request::is('contacto') ? 'active' : '' }}">
            <a class="nav-link" href="/contacto">Contactame</a>
        </li>

        <li class="nav-item {{Request::is('acerca') ? 'active' : '' }}">
            <a class="nav-link" href="/acerca">Acerca de</a>
        </li>

        </ul>

    </div>

</nav>