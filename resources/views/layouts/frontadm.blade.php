<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Yavu.cl</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        {!!Html::script('js/jquery.js')!!}
        {!!Html::script('js/vendor/bootstrap.min.js')!!}
        {!!Html::script('js/plugins.js')!!}
        {!!Html::script('js/main.js')!!}
        {!!Html::style('css/bootstrap.css')!!}
        {!!Html::style('css/style.css')!!}
        {!!Html::style('css/main.css')!!}
        {!!Html::style('css/bootstrap-theme.min.css')!!}
        {!!Html::script('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')!!}

        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- navbar-inverse -->
    <nav class="navbar navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Yavu</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">                
            <li>
              <a href="{!!URL::to('/')!!}">Inicio</a>
            </li>
            @if (!Auth::user()->check() && !Auth::empresa()->check())
              <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Registrar empresa<b class="caret"></b></a>                        
                <ul class="dropdown-menu">      
                <li><a href="{!!URL::to('/empresas/create')!!}">Registro de empresas</a></li> 
                  <li><a href="{!!URL::to('/empresas')!!}">Mostrar listado de empresas</a></li>
                  <li><a href="{!!URL::to('/sorteos')!!}">Sorteos por confirmar</a></li>
                </ul>
              </li> 
              <!--
                  <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Pagos<b class="caret"></b></a>                        
                <ul class="dropdown-menu">      
                <li><a href="{!!URL::to('/empresas')!!}">Registrar pago</a></li> 
                <li><a href="{!!URL::to('/empresas')!!}">Mostrar listado de deudores</a></li>
                </ul>
              </li> 
              -->
              <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Admintración<b class="caret"></b></a>                        
                <ul class="dropdown-menu">      
              <li><a href="{!!URL::to('/admins/create')!!}">Registro de Administradores</a></li>
                  <li><a href="{!!URL::to('/admins')!!}">Mostrar listado de Administradores</a></li>
                </ul>

                <li>
              <a href="{!!URL::to('/logout')!!}">Salir</a>
            </li>

              </li>   
            @endif            
          </ul>         
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
      @yield('content')
     <div class="container">

<!-- footer -->
      <footer role="contentinfo" class="site-footer" id="colophon">



        <div class="row">
          <div class="col-md-12">
            <img alt="Imagen corfo" src= "{!!URL::to('img/footer/corfo.png')!!}" class="img-responsive-centered"/></a>
          </div>
          <div class="col-md-4">

          </div>
          <div class="col-md-1">
            <a href="#!"><img  src= "{!!URL::to('img/footer/icono_facebook.png')!!}" class="img-responsive-centered"/></a>
          </div>
          <div class="col-md-1">
            <a href="#!"><img  src= "{!!URL::to('img/footer/icono_twitter.png')!!}" class="img-responsive-centered"/></a>
          </div>
          <div class="col-md-1">
            <a href="#!"><img  src= "{!!URL::to('img/footer/ico_instagram.png')!!}" class="img-responsive-centered"/></a>
          </div>
          <div class="col-md-1">
            <a href="#!"><img  src= "{!!URL::to('img/footer/icono_youtube.png')!!}" class="img-responsive-centered"/></a>

          </div>
          <div class="col-md-4">

          </div>
          <div class="col-md-12" style="text-align: center;">
            <spam>Copyright© ~ Yavu.cl 2016.</spam>
          </div>
        </div>


      </footer>

<!-- /footer -->
      
    </div> <!-- /container -->        
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>