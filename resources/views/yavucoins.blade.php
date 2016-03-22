@extends('layouts.front')
{!!Html::style('css/ycoins.css')!!}
{!!Html::script('js/ycoins.js')!!}
@section('content')


<html>
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jQuery Parallax Plugin Demo</title>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="http://ianlunn.co.uk/plugins/jquery-parallax/scripts/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="http://ianlunn.co.uk/plugins/jquery-parallax/scripts/jquery.localscroll-1.2.7-min.js"></script>
<script type="text/javascript" src="http://ianlunn.co.uk/plugins/jquery-parallax/scripts/jquery.scrollTo-1.4.2-min.js"></script>
</head>

<body>
  <ul id="nav">
    <li><a href="#intro" title="Next Section"><img src="http://ianlunn.co.uk/plugins/jquery-parallax/images/dot.png" alt="Link" /></a></li>
      <li><a href="#second" title="Next Section"><img src="http://ianlunn.co.uk/plugins/jquery-parallax/images/dot.png" alt="Link" /></a></li>
      <li><a href="#third" title="Next Section"><img src="http://ianlunn.co.uk/plugins/jquery-parallax/images/dot.png" alt="Link" /></a></li>
      <li><a href="#fifth" title="Next Section"><img src="http://ianlunn.co.uk/plugins/jquery-parallax/images/dot.png" alt="Link" /></a></li>
  </ul>
  
  <div id="intro">
    <div class="story">
        <div class="float-left">
      <h2>(Almost) Static Background</h2>
          <p>This section has a background that moves slightly slower than the user scrolls. This is achieved by changing the top position of the background for every pixel the page is scrolled.</p>
          </div>
      </div> <!--.story-->
  </div> <!--#intro-->
  
  <div id="second">
    <div class="story"><div class="bg"></div>
        <div class="float-right">
              <h2>Multiple Backgrounds</h2>
              <p>The multiple backgrounds applied to this section are moved in a similar way to the first section -- every time the user scrolls down the page by a pixel, the positions of the backgrounds are changed.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nibh erat, sagittis sit amet congue at, aliquam eu libero. Integer molestie, turpis vel ultrices facilisis, nisi mauris sollicitudin mauris, volutpat elementum enim urna eget odio. Donec egestas aliquet facilisis. Nunc eu nunc eget neque ornare fringilla. Nam vel sodales lectus. Nulla in pellentesque eros. Donec ultricies, enim vitae varius cursus, risus mauris iaculis neque, euismod sollicitudin metus erat vitae sapien. Sed pulvinar.</p>
          </div>
      </div> <!--.story-->
      
  </div> <!--#second-->
  
  <div id="third">
    <div class="story">
        <div class="float-left">
            <h2>What Happens When JavaScript is Disabled?</h2>
              <p>The user gets a slap! Actually, all that jQuery does is moves the backgrounds relative to the position of the scrollbar. Without it, the backgrounds simply stay put and the user would never know they are missing out on the awesome! CSS2 does a good enough job to still make the effect look cool.</p>
          </div>
      </div> <!--.story-->
  </div> <!--#third-->
  
  <div id="fifth">
    <div class="story">

      </div> <!--.story-->
  </div> <!--#fifth-->
</body>
</html>


@stop
