<!doctype html>
<html lang="pt-br">
  <head>
  	<title>{{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    
  </head>
  <body class="text-dark">
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		    <!-- <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(img/esalq.jpg);"></a> -->
	                <ul class="list-unstyled components mb-5">
                        @include("home.menu")
	                </ul>
	            </div>
    	    </nav>

            <!-- Page Content  -->
            <div id="content" class="p-4">

            <nav>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3">
                            <button type="button" id="sidebarCollapse" class="btn btn-primary" style="background-color: #345a4b">
                                <i class="fa fa-bars"></i>
                                <!--<span class="sr-only">Toggle Menu</span>-->
                            </button>
                        </div>                    
                        <div class="col-6 text-center">                    
                            <h3>{{ config('app.name') }}</h3>
                        </div>
                        <div class="col-3 text-right">
                            <img src="{{ asset('img/ESALQ-USP-preto.png') }}">
                        </div>
                    </div>

                    <div class="row border-dark border-top">
                        <div class="col-6 text-left">Login</div>
                        <div class="col-6 text-right">Sistema</div>
                    <div>
                </div>                
            </nav>
            
            <div  class="text-center" id="dados">
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

                @yield('dados')
            </div>
            
		    </div>
        </div>    

        <script src="{{ asset('js/popper.js') }}"></script>

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>        
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/datepicker-pt-BR.js') }}"></script>

        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

        

        @yield('javascripts_bottom')
  </body>
</html>