<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
</head>
<body>

    <!--<h1>Testando Bootstrap</h1> -->
    <div style="margin-left:160px; padding-top: 30px; padding-bottom: 30px;">                                                      
        <h1>Controle de Investimentos</h1>
    </div>

    <div class='menu'>        
        @include('home.menu')
    </div>

    <div class='container' style="height: 100%; padding-top: 25px; padding-bottom: 25px;">
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif        

        <div class="flash-message mt-3">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="fechar">&times;</a>
                </p>
                @endif
            @endforeach
        </div>

        @yield('content')
    </div>

    <div class='footer' style="height: 25px;">
        @include('home.footer') 
    </div>    

    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/datepicker-pt-BR.js') }}"></script>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

    
    @yield('javascripts_bottom')

</body>
</html>