<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap Core CSS -->
  {!!Html::style('css/bootstrap.min.css')!!}
    <!-- Custom Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  {!!Html::style('font-awesome/css/font-awesome.min.css')!!}
    <!-- Plugin CSS -->
  {!!Html::style('css/magnific-popup.css')!!}
    <!-- Custom CSS -->
  {!!Html::style('css/creative.css')!!}
</head> <!-- /head -->

<body id="page-top">



      {{--
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

            <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> <!-- /button -->
        <a class="navbar-brand page-scroll" href="/">Inicio</a> <!-- /a navbar-brand page-scroll -->
      </div> <!-- /div container-fluid -->
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a class="page-scroll" href="#page-top">Arriba</a>
          </li> <!-- /li -->
          <li>
            <a class="page-scroll" href="#thatare">Qu&eacute; son?</a>
          </li> <!-- /li -->
          <li>
            <a class="page-scroll" href="#howto">Cómo participar?</a>
          </li> <!-- /li -->
          <li>
            <a class="page-scroll" href="#empresas">Empresas Asociadas</a>
          </li> <!-- /li -->
          <li>
            <a class="page-scroll" href="#registro">Registrate</a>
          </li> <!-- /li -->
        </ul> <!-- /ul nav navbar-nav navbar-right -->
      </div> <!-- /div collapse navbar-collapse -->

            <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>
      --}}


  <header>
  </header>

  <section id="registro" style="padding: 10px 10px 10px 10px;background-color: #BEF781;">
    <aside {{-- class="bg-primary" --}}>
      <div class="container text-center">
        <div class="call-to-action">

          <a data-toggle="modal" data-target="#gridSystemModal" role="button" class="btn sr-button">
            <img src="img/newGraphics/registrate_02a.png" class="img-responsive" alt="">
          </a> <!-- /a btn sr-button -->
          @if(!Auth::user()->check())
            @include('mainViews.indexPartial.modalRegister')
          @endif
        </div> <!-- /div .call-to-acction -->
      </div> <!-- /aside .bg-primary -->
    </aside> <!-- /aside .bg-primary -->
  </section> <!-- /section #registro -->


  <section {{-- class="bg-primary" --}} id="thatare" style="">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 text-center">
          <h2 class="section-heading">
            ¡ Participa en sorteos todas las semanas !
          </h2>
          {{-- <hr class="light"> --}}
          <p {{-- class="text-faded" --}} class="text-muted">¡ B&uacute;sca todas las yavücoins que quieras !</p>
        </div> <!-- /div col-lg-8 col-lg-offset-2  -->
      </div> <!-- /div .row-->
    </div> <!--/div .container -->
  </section> <!-- /section #thatare -->

  <section id="howto">

    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading">Cómo Participar?</h2>
          <hr class="light">
          <p class="text-muted">Descubre publicaciones que los comercios tienen para ti, de cada publicaci&oacute;n obt&eacute;n yavücoins para participar en nuestro sitio. ¡ De todas las publicaciones, recibiras coins !</p>
        </div> <!-- /div col-lg-12 -->
      </div> <!-- /div row -->
    </div> <!-- /div container -->



  </section> <!-- /section #howto -->

  <section>
    <div class="container">
      <div class="row">
        <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6' align='middle'>
          <div class="service-box">
            <img src="/img/newGraphics/neo_icono_comercio02.png" class="img-responsive">
            <h3>Acumula tus coins</h3>
            <p class="text-muted">Acumula nuestras Yavü Coins en las publicaciones de las empresas.</p>
          </div> <!-- /div service-box -->
        </div> <!-- /div col-xs-12 col-sm-12 col-md-6 col-lg-6 -->
        <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6' align='middle'>
          <div class="service-box">
            <img src="/img/newGraphics/neo_icono_conoce_empresa.png" class="img-responsive">
            <h3>Participa por sorteos</h3>
            <p class="text-muted">Compra Tickets con tus Coins y úsalos en los sorteos.</p>
          </div> <!-- /div service-box -->
        </div> <!-- /div col-xs-12 col-sm-12 col-md-6 col-lg-6 -->
      </div> <!-- /div row -->
    </div> <!-- /div container -->
  </section>

  <section id="registro" style="padding: 10px 10px 10px 10px;background-color: #BEF781;">
    <aside {{-- class="bg-primary" --}}>
      <div class="container text-center">
        <div class="call-to-action">

          <a data-toggle="modal" data-target="#gridSystemModal" role="button" class="btn sr-button">
            <img src="img/newGraphics/registrate_02a.png" class="img-responsive" alt="">
          </a> <!-- /a btn sr-button -->
          @if(!Auth::user()->check())
            @include('mainViews.indexPartial.modalRegister')
          @endif
        </div> <!-- /div .call-to-acction -->
      </div> <!-- /aside .bg-primary -->
    </aside> <!-- /aside .bg-primary -->
  </section> <!-- /section #registro -->

  <section class="no-padding" id="empresas">
    <div class="container-fluid">
      <div class="row no-gutter popup-gallery">

        @foreach($companies as $key => $company)
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
            <a href="img/portfolio/fullsize/1.jpg" class="portfolio-box">
              <img src="img/users/{!! $company->imagen_perfil !!}" class="img-responsive" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    <!-- Some Text-->
                  </div> <!-- /div project-category text-faded -->
                  <div class="project-name">
                    {!! $company->nombre !!}
                  </div> <!-- /div .project-name-->
                </div> <!-- /div .portfolio-box-caption-content -->
              </div> <!-- /div .portfolio-box-caption -->
            </a> <!-- /a .portfolio-box -->
          </div> <!-- /div col-lg-4 col-sm-6 -->
        @endforeach

      </div> <!-- /div .row .no-gutter .popup-gallery -->
    </div> <!-- /div .container-fluid -->
  </section> <!-- /section #empresas-->

<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="js/scrollreveal.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/jquery.fittext.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/creative.js"></script>

</body> <!-- /body #page-top -->
</html>
