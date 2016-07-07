@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') Preguntas Frecuentes / FAQ @stop
@extends('layouts.front')
@section('content')

    <div class="jumbotron section-c"> <!-- header -->
        <div class="contentMiddle">
            <h3>Preguntas Frecuentes / <span>FAQ</span></h3>
        </div>
    </div><!-- end header-->
    <div class="jumbotron section-b">
        <div class="contentMiddle">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                ¿Qué Somos?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            Somos un empresa dedicada a publicidad en internet, específicamente en nuestro sitio web Yavu.cl
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                ¿Qué es Yavü?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            Yavü es la nueva plataforma en donde empresas, concursos y premios coexisten para brindar un servicio único a nuestros usuarios. Busca acercar los comercios del país a los usuarios del sitio por medio del contenido generado por los mismos, entregados de una manera simple, efectiva y entretenida para los visitantes del mismo.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                ¿Cómo Funciona?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            Yavü permite que el usuario de nuestro sitio sea premiado al interactuar con el contenido las empresas registradas en el mismo, este premio consiste en YavuCoins las cuales pueden ser utilizadas por los usuarios para participar por premios en sorteos y proximas funcionalidades de canje que estarán disponibles dentro de poco.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                ¿Qué Ofrecemos?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class="panel-body">
                            Ofrecemos a los usuarios un mundo de beneficios al conocer lo que los comercios publicitan en tiempo real, adicionalmente de participar por premios de las mismas empresas registradas y futuras opciones de canje que estamos implementando. <br>
                            Ofrecemos a las empresas (nuestros clientes) una oportunidad única de acercamiento a la gente, entregando que su publicidad/contenido sea visualizado de forma entretenida, generando una nueva forma de consumo de publicidad en internet.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFive">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                ¿Qué información necesitan de sus Usuarios/Clientes?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                        <div class="panel-body">
                            Información Personal y de contacto, como lo es su nombre, RUN, dirección, correo electrónico. No todas son obligatorias, pero si deseas aprovechar las YavuCoins, participar por premios y futuros canjes deberás completar todos tus datos, lo anterior responde a tener la información correcta y fidedigna personal y evitar suplantación de identidad al acceder a los beneficios de nuestro portal.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingSix">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                ¿Qué hacen con la información recopilada?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                        <div class="panel-body">
                            Todos los datos recopilados son utilizados únicamente con fines estadísticos. <br>
                            En Yavü nos preocupamos de la privacidad de los usuarios, puede profundizar más leyendo los <a href="{!!URL::to('/terminos/')!!}">Términos y Condiciones</a> que aplican a los usuarios del sitio.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop