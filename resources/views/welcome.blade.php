@extends('layouts.main')

@section('content')

    <section class="top-nav">
        <div>
            <img src="assets/img/encontre-trabajo-blanco.png" alt="">
        </div>
        <input id="menu-toggle" type="checkbox" />
        <label class='menu-button-container' for="menu-toggle">
            <div class='menu-button'></div>
        </label>
        <ul class="menu">
            <li><a class="item-menu_a" href="{{ url('/') }}">Inicio</a></li>
            <!--<li><a class="item-menu_a" href="#">Historia</a></li>-->
            <!--<li><a class="item-menu_a" href="#">Buscar Empleos</a></li>-->
            <li><a class="item-menu_a" href="{{ env('PLATFORM_URL').'/offers/create' }}">Publica tu oferta</a></li>
            <li><a class="item-menu_a" href="{{ env('PLATFORM_URL').'/register' }}">Crea tu cuenta</a></li>
            <li><a class="item-menu_a" href="{{ env('PLATFORM_URL').'/' }}">Ingresa a tu cuenta</a></li>
        </ul>
    </section>            
      <!--Banner-->
    <section class="banner">
        <div id="demo" class="carrusel-principal" data-ride="carousel">
            
                {{--<div class="carousel-item active">
                    <img class="img-carrusel-banner-et" src="{{ asset('assets/img/Banner-01.png') }} " alt=" banner encontre trabajo">  
                </div>
                <div class="carousel-item">
                    <img  class="img-carrusel-banner-et" src="{{ asset('assets/img/Banner-02.png') }}" alt="banner encontre trabajo">
                </div>--}}
                
                    <video  class="img-carrusel-banner-et" loop style="width: 100%;" autoplay="true" muted="muted">
                        <source src="{{ asset('assets/img/banner-video.mp4') }}" type="video/mp4">
                    </video>
             
               {{--@foreach(App\Carousel::where('status', 1)->get() as $carousel)
                    <div class="carousel-item @if($loop->index == 0) active @endif">
                        <img class="img-carrusel-banner-et" src="{{ $carousel->image }} " alt=" banner encontre trabajo">  
                    </div>
                @endforeach--}}
           
            
        <div class="carrusel-principal-inf">
 
            <div style="width: 100%; height: 100%; top: 0; position: absolute; background-color: rgba(0, 0, 0, 0.2)">
                <div class="carrusel-principal-inf-logo">
                    <div class="carrusel-principal-inf-logo-img"><img class="carrusel-principal-inf-logo-img_img" src="{{ asset('assets/img/logop.png') }}" alt=""></div>
                </div>
                
                <div class="buscador">
                    <input class="buscador-et" type="text" placeholder="Busca tu nuevo trabajo">
                    <select name="" id="" class="select-buscador">
                        <option value="">Seleccione</option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                    </select>
                    <button type="button" class="btn-lupa-et" href="#"> <img class="buscador_img" src="{{ asset('assets/img/lupa-buscador.png') }}" alt=""> </button>
                </div>
                <!-- <div class="div-postulate"><a class=" btn-et" href="{{ env('PLATFORM_URL').'/register' }}">Postulate YA</a></div> -->
                <!-- <h4 class="text-center text-azul">Más de 300 trabajos esperan por ti</h4> -->
                <h3 class="text-center l-a text-banner-g">Publica tus ofertas laborales</h3>
                <h3 class="text-center l-a text-banner-m">Alcanza a tu candidato ideal en tiempo record</h3>
                <h3 class="text-center l-a text-banner-p">Publica tus ofertas laborales</h3>
                    <div class="grupo-btn-et">
                    <a class="grupo-btn-et_a" href="{{ env('PLATFORM_URL').'/' }}">Ingresa tu sesión</a>
                    <a class="grupo-btn-et_a" href="{{ env('PLATFORM_URL').'/register' }}">Crear tu cuenta</a>
                    <a class="grupo-btn-et_a" href="{{ env('PLATFORM_URL').'/offers/create' }}">Publica Gratis</a>
                    <a class="grupo-btn-et_azul" href="#" >VER PLANES</a>


                    <!-- <a class="grupo-btn-et_a" href="{{ env('PLATFORM_URL').'/offers/create' }}">Publica tu oferta laboral gratis</a>
                    <a class="grupo-btn-et_a" href="{{ env('PLATFORM_URL').'/home' }}">Busca tu empleo</a> -->
                </div>
            </div>
        </div> 
        
    </section>
        
        <section class="ofertas">
            <h3  class=" text-center text-azul">Empresas que <strong><u>publican con nosotros</u></strong></h3>
            <div class="container ofertas-opciones">
                <div class="row ofertas-opciones-row">
                    
                    <div class="col-md-2 ofertas-opciones-item">
                        <a href="#"> 
                            <p class="text-center">
                                <img style="width: 100%;" src="{{ url('/assets/img/client.png') }}">
                            </p>
                        </a>
                    </div>

                    <div class="col-md-2 ofertas-opciones-item">
                        <a href="#"> 
                            <p class="text-center">
                                <img style="width: 100%;" src="{{ url('/assets/img/client.png') }}">
                            </p>
                        </a>
                    </div>

                    <div class="col-md-2 ofertas-opciones-item">
                        <a href="#"> 
                            <p class="text-center">
                                <img style="width: 100%;" src="{{ url('/assets/img/client.png') }}">
                            </p>
                        </a>
                    </div>


                    <div class="col-md-2 ofertas-opciones-item">
                        <a href="#"> 
                            <p class="text-center">
                                <img style="width: 100%;" src="{{ url('/assets/img/client.png') }}">
                            </p>
                        </a>
                    </div>


                    <div class="col-md-2 ofertas-opciones-item">
                        <a href="#"> 
                            <p class="text-center">
                                <img style="width: 100%;" src="{{ url('/assets/img/client.png') }}">
                            </p>
                        </a>
                    </div>


                    <div class="col-md-2 ofertas-opciones-item">
                        <a href="#"> 
                            <p class="text-center">
                                <img style="width: 100%;" src="{{ url('/assets/img/client.png') }}">
                            </p>
                        </a>
                    </div>


                    <div class="col-md-2 ofertas-opciones-item">
                        <a href="#"> 
                            <p class="text-center">
                                <img style="width: 100%;" src="{{ url('/assets/img/client.png') }}">
                            </p>
                        </a>
                    </div>


                    <div class="col-md-2 ofertas-opciones-item">
                        <a href="#"> 
                            <p class="text-center">
                                <img style="width: 100%;" src="{{ url('/assets/img/client.png') }}">
                            </p>
                        </a>
                    </div>


                    <div class="col-md-2 ofertas-opciones-item">
                        <a href="#"> 
                            <p class="text-center">
                                <img style="width: 100%;" src="{{ url('/assets/img/client.png') }}">
                            </p>
                        </a>
                    </div>

                    <div class="col-md-2 ofertas-opciones-item">
                        <a href="#"> 
                            <p class="text-center">
                                <img style="width: 100%;" src="{{ url('/assets/img/client.png') }}">
                            </p>
                        </a>
                    </div>

                    <div class="col-md-2 ofertas-opciones-item">
                        <a href="#"> 
                            <p class="text-center">
                                <img style="width: 100%;" src="{{ url('/assets/img/client.png') }}">
                            </p>
                        </a>
                    </div>

                    <div class="col-md-2 ofertas-opciones-item">
                        <a href="#"> 
                            <p class="text-center">
                                <img style="width: 100%;" src="{{ url('/assets/img/client.png') }}">
                            </p>
                        </a>
                    </div>
                    
                
                </div>
            </div>
        </section> 

        <section class="ofertas">
            <h3  class=" text-center text-azul">Hoy hay <strong><u>1500 empresas</u></strong> contratando</h3>
            <div class="container ofertas-opciones">
                <div class="row ofertas-opciones-row">
                    @foreach(App\Offer::take(12)->with("user")->has("user")->where('status', 'abierto')->whereDate('expiration_date', '>', Carbon\Carbon::today()->toDateString())->get() as $offer)
                        <div class="col-md-2 ofertas-opciones-item">
                            <a href="{{ env('PLATFORM_URL').'/offers/detail/'.$offer->slug }}"> 
                                <p class="text-center">
                                    <img class="ofertas-opciones-item-img" src="{{ $offer->user->image }}">
                                </p>
                                <h3 class="text-center">{{ $offer->title }}</h3>
                                <h5 class="ofertas-opciones-item-h5">Ver oferta</h5>
                            </a>
                        </div>
                    @endforeach
                
                </div>
            </div>
        </section> 
      <section class="opcion-en-web-et">
        <div class="container opcion-en-web-et-container">
            <div class="row">
                <div class="col-md-3 opcion-en-web-et-container-col">
                    <a href="">
                        <div class="opcion-en-web-et-container-col"><div class="opcion-en-web-et-container-col-box"></div></div>
                        <h6 class="opcion-en-web-et-container-col_h6">Registro gratuito</h6>
                    </a>
                </div>
                <div class="col-md-3 opcion-en-web-et-container-col">
                   <a href="">
                        <div class="opcion-en-web-et-container-col"><div class="opcion-en-web-et-container-col-box"></div></div>
                        <h6 class="opcion-en-web-et-container-col_h6">Nuevos empleos diariamente</h6>
                    </a>
                    </div>
                <div class="col-md-3 opcion-en-web-et-container-col">
                     <a href="">   
                        <div class="opcion-en-web-et-container-col"><div class="opcion-en-web-et-container-col-box"></div></div>
                        <h6 class="opcion-en-web-et-container-col_h6">Ofertas seleccionadas en tu correo</h6>
                    </a>
                </div>
                <div class="col-md-3 opcion-en-web-et-container-col">
                    <a href="">
                        <div class="opcion-en-web-et-container-col"><div class="opcion-en-web-et-container-col-box"></div></div>
                        <h6 class="opcion-en-web-et-container-col_h6">Completa tu perfil profesional</h6>
                    </a>
                </div>
            </div>
        </div>
      </section>
      <section class="buscar-empleo-localizacion">
        <div class="container">
            <!--<h5 class="buscar-empleo-localizacion_h5"> Buscar empleos por localización</h5>-->
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item ">
                <a class="nav-link link-tab-opcion-en-web active" data-toggle="tab" href="#home">Localización</a>
                </li>
                <li class="nav-item">
                <a class="nav-link link-tab-opcion-en-web" data-toggle="tab" href="#menu1">Cargos profesionales</a>
                </li>
                <li class="nav-item">
                <a class="nav-link link-tab-opcion-en-web" data-toggle="tab" href="#menu2">Categorias</a>
                </li>
                <li class="nav-item">
                <a class="nav-link link-tab-opcion-en-web" data-toggle="tab" href="#menu3">Salarios</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                <h3>Localización</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                <h3>Cargos profesionales</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div id="menu2" class="container tab-pane fade"><br>
                    <div class="row categorias-row">
                        <div class="col-md-3 categorias-row-col-3">
                            <ul>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Ventas</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Almacen / Logistica / Transporte</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">CallCenter / Telemercado</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Recursos Humanos</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Diseño / Artes gráficas</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Legal / Asesoría</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 categorias-row-col-3">
                            <ul>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Informática / Telecomunicaciones</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Hosteleria / Turismo</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Contabilidad / Finanzas</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Mantenimiento y Reparación</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Mercadotécnica / Publicidad / Co...</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Dirección / Gerencia</a></li>
                            </ul>
                        </div>                        
                        <div class="col-md-3 categorias-row-col-3">
                            <ul>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Administración / Oficina</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Servicios Generales, Aseo y Se...</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Construccion y obra</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Docencia</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Compras / Comercio Exterior</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 categorias-row-col-3">
                            <ul>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Producción / Operarios</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Atención a clientes</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Medicina / Salud</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Ingeniería</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="">Investigación y Calidad</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div id="menu3" class="container tab-pane fade"><br>
                <h3>Categorias</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
            </div>
        </div>
        

      </section>  
      <section class="nosotros">
          <div class="container nosotros-container">
              <div class="row col-flex">
                    <div class="col-md-3 nosotros-container-row-col">
                        <h6 class="nosotros-container-row-col_h6">Institucional</h6>
                        <ul>
                            <li><a class="nosotros-container-row-col_a" href="">¿Quienés Somos?</a></li>
                            <li><a class="nosotros-container-row-col_a" href="">Contacto para personas</a> </li>
                            <li><a class="nosotros-container-row-col_a" href="">Aviso Legal y Privacidad</a> </li>
                        </ul>
                    </div>
                    <div class="col-md-3 nosotros-container-row-col">
                        <h6 class="nosotros-container-row-col_h6">Candidatos</h6>
                        <ul>
                                <li><a class="nosotros-container-row-col_a" href="">Preguntas frecuentes de candidatos</a></li>
                                <li><a class="nosotros-container-row-col_a" href="">Empleos por Categoria</a></li>
                                <li><a class="nosotros-container-row-col_a" href="">Empleos por ciudades </a></li>
                                <li><a class="nosotros-container-row-col_a" href="">Empleos por regiones</a></li>
                                <li><a class="nosotros-container-row-col_a" href="">Empleos por carga profesional</a></li>
                                <li><a class="nosotros-container-row-col_a" href="">Empleos por salario</a></li>
                                <li><a class="nosotros-container-row-col_a" href="">Empresas por localización</a></li>
                                <li><a class="nosotros-container-row-col_a" href="">Empresas por industria</a></li>
                                <li><a class="nosotros-container-row-col_a" href="">Pruebas de aptitudes</a></li>
                        </ul>

                    </div>
                    <div class="col-md-3 nosotros-container-row-col">
                        <h6 class="nosotros-container-row-col_h6">Reclutadores</h6>
                        <ul>
                            <li><a class="nosotros-container-row-col_a" href="">Preguntas frecuentes de empresas</a></li>
                            <li><a class="nosotros-container-row-col_a" href="">Contacto para empresas</a></li>
                            <li><a class="nosotros-container-row-col_a" href="">Buscar candidatos </a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 nosotros-container-row-col">
                        <img class="nosotros-container-row-col_img" src="{{ asset('assets/img/botones-google-play-app-store.png') }}" alt="">
                    </div>
                </div>
          </div>
      </section>   

@endsection