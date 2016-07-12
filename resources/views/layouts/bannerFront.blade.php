<script>
  $(document).ready(function(){
    $('.carousel').carousel({
      interval: 2000
    });
  });

</script>
<header id = "myCarousel" class = "carousel slide " style="">
<!-- Indicadores -->
  <ol class = "carousel-indicators">
    <li data-target = "#myCarousel" data-slide-to = "0" class="active"></li>
    <li data-target = "#myCarousel" data-slide-to = "1"></li>
    <li data-target = "#myCarousel" data-slide-to = "2" ></li>
    {{--
    <li data-target = "#myCarousel" data-slide-to = "3" ></li>
    <li data-target = "#myCarousel" data-slide-to = "4" ></li>
    --}}
  </ol>
  <!-- Páginas de Slides -->
  <div class = "carousel-inner">

    <div class = "carousel-caption">

      {{--
       aun no pero ta weno
      @include('mainViews.loginPartial.sectionCenter')
       --}}

    </div>

  <!-- 
    <div class = "item active">
   
      <div class="fill"><img style="background-size:cover;" src = "img/BannerFront/banner5.jpg" width=100%></div>
        <div class = "carousel-caption">
           
          <div class="title-slide"><br>            
            <h1 class="txt-responsive">YaVu</h1>
            <p>Encontrar donde comprar, est&aacute; Aqu&iacute;.</p> 
          </div>            
        

        </div>
    </div>
    
    -->

    <div class = "item active">
      <!-- Set the second background image using inline CSS below. -->    
      <div class="fill"><img style="background-size:cover;" src = "img/newGraphics/neobanner01.jpg" width=100%></div>
        <div class = "carousel-caption">

           <!--

          <div class="title-slide"><br>
              <h1 class="txt-responsive">YaVu</h1>
              <p>Sitio web exclusivo de pymes virtuales.</p>
          </div>

          -->
        </div>
    </div>
    <div class = "item ">
      <!-- Set the third background image using inline CSS below. -->    
      <div class="fill"><img style="background-size:cover;" src = "img/newGraphics/neobanner02.jpg" width=100%></div>
        <!--
        <div class = "carousel-caption">
          <div class="title-slide"><br>
              <h1 class="txt-responsive">YaVu</h1>
              <p>Gesti&oacute;n r&aacute;pida y transparente.</p>
          </div>  
        </div>
        -->
    </div>
    <div class = "item">
          <!-- Set the fourth background image using inline CSS below. -->    
      <div class="fill"><img style="background-size:cover;" src = "img/newGraphics/neobanner03.jpg" width=100%></div>
       
        <!--
        <div class = "carousel-caption">
          <div class="title-slide"><br>
              <h1 class="txt-responsive">YaVu</h1>
              <p>Priorice sus compras</p>
          </div>        
        </div>
        -->

    </div>

    {{--
    <div class = "item">
     
      <div class="fill"><img style="background-size:cover;" src = "img/newGraphics/neobanner04.jpg" width=100%></div>

      <!--
      <div class = "carousel-caption">
        <div class="title-slide"><br>
            <h1 class="txt-responsive">YaVu</h1>
            <p>Priorice sus compras</p>
        </div>
      </div>
      -->

    </div>

    <div class = "item">

      <div class="fill"><img style="background-size:cover;" src = "img/newGraphics/neobanner05.jpg" width=100%></div>




    </div>

  </div>
  --}}
  <!-- Controles -->         
  <a class = "carousel-control left" href = "#myCarousel" data-slide = "prev">
    <span class = "icon-prev"></span>
  </a>
  <a class = "carousel-control right" href = "#myCarousel" data-slide = "next">
    <span class = "icon-next"></span>
  </a>

</header>
