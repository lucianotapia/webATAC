<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid" style="margin-left:160px;">
        <a class="navbar-brand" href="#">MENU</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cadastros
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="{{ url('/aporte') }}">Aportes</a></li>
                <li><a class="dropdown-item" href="{{ url('/carteira') }}">Carteira</a></li>
                <li><a class="dropdown-item" href="{{ url('/conta') }}">Conta</a></li>
                <li><a class="dropdown-item" href="{{ url('/tipo') }}">Tipo</a></li>
                <li><a class="dropdown-item" href="{{ url('/usuario') }}">Usuário</a></li>
                <li><a class="dropdown-item" href="{{ url('/operacao') }}">Operações</a></li>
            </ul>
            </li>
        </ul>
        </div>
    </div>
</nav>