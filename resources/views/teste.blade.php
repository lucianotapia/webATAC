<!doctype html>
<html lang="pt-br">
  <head>
  	<title>{{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
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
                            <img src="img/ESALQ-USP-preto.png">
                        </div>
                    </div>

                    <div class="row border-dark border-top">
                        <div class="col-6 text-left">Login</div>
                        <div class="col-6 text-right">Sistema</div>
                    <div>
                </div>
                
            </nav>
            
            <div class="text-center" id="dados">
                <div id="form">
                <!--<h2 class="mb-4">Sidebar #01</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                -->
                @yield('dados')
                OK O FORMULÁRIO VAI AQUI
                </div>
            </div>
		    </div>
        </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>