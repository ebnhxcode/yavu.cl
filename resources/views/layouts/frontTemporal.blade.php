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

  {!!Html::style('css/bootstrap.css')!!}
  {!!Html::style('css/style.css')!!}
  {!!Html::script('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')!!}
    <!-- {!!Html::style('css/main.css')!!} -->
  <style>
    body {
      padding-top:50px;
      padding-bottom: 20px;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-fixed-top" role="navigation">
  <div class="container">


  </div>
</nav>
@yield('content')
<div class="container">
</div> <!-- /container -->
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<!-- Google Analytics: -->
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','UA-76276902-1','auto');ga('send','pageview');
</script>
</body>
</html>