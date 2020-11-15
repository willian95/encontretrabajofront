@extends('layouts.main')

@section('content')

    @include('partials.navbar')         
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
                        <input class="buscador-et" type="text" placeholder="Busca tu nuevo trabajo" id="job_search">
                        <select name="" class="select-buscador" id="region_search">
                            @foreach(App\Region::all() as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn-lupa-et" onclick="storeQuery()"> <img class="buscador_img" src="{{ asset('assets/img/lupa-buscador.png') }}" alt=""> </button>
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
                        <a class="grupo-btn-et_azul" href="#" data-toggle="modal" data-target="#myModal" >VER PLANES</a>


                        <!-- <a class="grupo-btn-et_a" href="{{ env('PLATFORM_URL').'/offers/create' }}">Publica tu oferta laboral gratis</a>
                        <a class="grupo-btn-et_a" href="{{ env('PLATFORM_URL').'/home' }}">Busca tu empleo</a> -->
                    </div>
                </div>
            </div> 
        </section>
        <div class="modal " id="myModal">
            <div class="modal-dialog modal-planes">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center-plan-t">
                    <h4 class="modal-title text-center">Nuestros Planes</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">

                    <div class="row d-flex justify-content-center">
                        @foreach(App\Plan::where("position", 1)->orderBy("price", "asc")->get() as $plan)
                        <div class="col-md-3">
                            <div class="content-plan">   
                                <div class=" card-planes mb-3 mt-3">
                                    <div class="card">
                                        <div class="img-planes d-flex justify-content-center">
                                            <img src="{{ asset('assets/img/logop.png') }}" alt="logo encontre trabajo">
                                        </div>
                                        <h2 class="text-center text-uppercase">{{ $plan->title }}</h2>
                                        <h3 class="text-center"><small class="">$</small>{{ number_format($plan->price, 0, ",", ".") }}</h3>
                                        <h6 class="text-center text-uppercase">iva incluido</h6>
                                        <img class="wave_img" src="{{ asset('assets/img/wamarillo.svg') }}" alt="waves">

                                        <div class="box-waves fondo-am">
                                            <div class="box-waves_img">
                                            </div>

                                            <div class="box-waves-text fondo-am">
                                                <ul class="text-center box-waves-text_ul ">
                                                    @if($plan->offer_posting == 1)
                                                    <li >Publicación en la plataforma laboral y en nuestras redes sociales.</li>
                                                    @endif
                                                    @if($plan->post_days > 0)
                                                    <li>Duración de {{ $plan->post_days }} días.</li>
                                                    @endif
                                                    @if($plan->simple_post_infinity == 1)
                                                        Publicaciones simples ilimitadas por @if($plan->plan_time == "semestrales") 6 meses @elseif($plan->plan_time == "anuales") 12 meses @endif
                                                    @elseif($plan->simple_posts > 0)
                                                    <li>{{ $plan->simple_posts }} @if($plan->simple_posts == 1)publicación simple. @else publicaciones simples. @endif</li>
                                                    @endif
                                                    @if($plan->hightlight_posts > 0)
                                                    <li>{{ $plan->hightlight_posts }} @if($plan->hightlight_posts == 1) publicación destacada. @else publicaciones destacadas. @endif</li>
                                                    @endif
                                                    @if($plan->download_curriculum == 1)
                                                    <li>Descarga de Curriculum Vitae.</li>
                                                    @endif
                                                    @if($plan->show_video == 1)
                                                    <li>Video de Presentación del Candidato.</li>
                                                    @endif
                                                    @if($plan->download_profiles > 0)
                                                    <li>Podrás entrar al motor de búsqueda y descargar {{ $plan->download_profiles }} @if($plan->download_profiles == 1) perfil. @else perfiles. @endif</li>
                                                    @endif
                                                    @if($plan->conference_infinity == 1)
                                                        <li>Video entrevistas Ilimitadas por @if($plan->plan_time == "semestrales") 6 meses @elseif($plan->plan_time == "anuales") 12 meses @endif</li>
                                                    @elseif($plan->conference_amount > 0)
                                                        <li>{{ $plan->conference_amount }} @if($plan->conference_amount == 1)video entrevista con postulantes. @else video entrevista con postulantes. @endif</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="row d-flex justify-content-center">
                        @foreach(App\Plan::where("position", 2)->orderBy("price", "asc")->get() as $plan)
                        <div class="col-md-3">
                            <div class="content-plan">   
                                <div class=" card-planes mb-3 mt-3">
                                    <div class="card">
                                        <div class="img-planes d-flex justify-content-center">
                                            <img src="{{ asset('assets/img/logop.png') }}" alt="logo encontre trabajo">
                                        </div>
                                        <h2 class="text-center text-uppercase">{{ $plan->title }}</h2>
                                        <h3 class="text-center"><small class="">$</small>{{ number_format($plan->price, 0, ",", ".") }}</h3>
                                        <h6 class="text-center text-uppercase">iva incluido</h6>
                                        <img class="wave_img" src="{{ asset('assets/img/wazul.svg') }}" alt="waves">

                                        <div class="box-waves fondo-az">
                                            <div class="box-waves_img">
                                            </div>

                                            <div class="box-waves-text fondo-az">
                                                <ul class="text-center box-waves-text_ul ">
                                                    @if($plan->offer_posting == 1)
                                                    <li >Publicación en la plataforma laboral y en nuestras redes sociales.</li>
                                                    @endif
                                                    @if($plan->post_days > 0)
                                                    <li>Duración de {{ $plan->post_days }} días.</li>
                                                    @endif
                                                    @if($plan->simple_post_infinity == 1)
                                                        Publicaciones simples ilimitadas por @if($plan->plan_time == "semestrales") 6 meses @elseif($plan->plan_time == "anuales") 12 meses @endif
                                                    @elseif($plan->simple_posts > 0)
                                                    <li>{{ $plan->simple_posts }} @if($plan->simple_posts == 1)publicación simple. @else publicaciones simples. @endif</li>
                                                    @endif
                                                    @if($plan->hightlight_posts > 0)
                                                    <li>{{ $plan->hightlight_posts }} @if($plan->hightlight_posts == 1) publicación destacada. @else publicaciones destacadas. @endif</li>
                                                    @endif
                                                    @if($plan->download_curriculum == 1)
                                                    <li>Descarga de Curriculum Vitae.</li>
                                                    @endif
                                                    @if($plan->show_video == 1)
                                                    <li>Video de Presentación del Candidato.</li>
                                                    @endif
                                                    @if($plan->download_profiles > 0)
                                                    <li>Podrás entrar al motor de búsqueda y descargar {{ $plan->download_profiles }} @if($plan->download_profiles == 1) perfil. @else perfiles. @endif</li>
                                                    @endif
                                                    @if($plan->conference_infinity == 1)
                                                        <li>Entrevistas Ilimitadas por @if($plan->plan_time == "semestrales") 6 meses @elseif($plan->plan_time == "anuales") 12 meses @endif</li>
                                                    @elseif($plan->conference_amount > 0)
                                                        <li>{{ $plan->conference_amount }} @if($plan->conference_amount == 1)video entrevista con postulantes. @else video entrevista con postulantes. @endif</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="row d-flex justify-content-center">
                        @foreach(App\Plan::where("position", 3)->orderBy("price", "asc")->get() as $plan)
                        <div class="col-md-3">
                            <div class="content-plan">   
                                <div class=" card-planes mb-3 mt-3">
                                    <div class="card">
                                        <div class="img-planes d-flex justify-content-center">
                                            <img src="{{ asset('assets/img/logop.png') }}" alt="logo encontre trabajo">
                                        </div>
                                        <h2 class="text-center text-uppercase">{{ $plan->title }}</h2>
                                        <h3 class="text-center"><small class="">$</small>{{ number_format($plan->price, 0, ",", ".") }}</h3>
                                        <h6 class="text-center text-uppercase">iva incluido</h6>
                                        <img class="wave_img" src="{{ asset('assets/img/wverde.svg') }}" alt="waves">

                                        <div class="box-waves fondo-ve">
                                            <div class="box-waves_img">
                                            </div>

                                            <div class="box-waves-text fondo-ve">
                                                <ul class="text-center box-waves-text_ul ">
                                                    @if($plan->offer_posting == 1)
                                                    <li >Publicación en la plataforma laboral y en nuestras redes sociales.</li>
                                                    @endif
                                                    @if($plan->post_days > 0)
                                                    <li>Duración de {{ $plan->post_days }} días.</li>
                                                    @endif

                                                    @if($plan->simple_post_infinity == 1)
                                                        Publicaciones simples ilimitadas por @if($plan->plan_time == "semestrales") 6 meses @elseif($plan->plan_time == "anuales") 12 meses @endif
                                                    @elseif($plan->simple_posts > 0)
                                                    <li>{{ $plan->simple_posts }} @if($plan->simple_posts == 1)publicación simple. @else publicaciones simples. @endif</li>
                                                    @endif
                                                    @if($plan->hightlight_posts > 0)
                                                    <li>{{ $plan->hightlight_posts }} @if($plan->hightlight_posts == 1) publicación destacada. @else publicaciones destacadas. @endif</li>
                                                    @endif
                                                    @if($plan->download_curriculum == 1)
                                                    <li>Descarga de Curriculum Vitae.</li>
                                                    @endif
                                                    @if($plan->show_video == 1)
                                                    <li>Video de Presentación del Candidato.</li>
                                                    @endif
                                                    @if($plan->download_profiles > 0)
                                                    <li>Podrás entrar al motor de búsqueda y descargar {{ $plan->download_profiles }} @if($plan->download_profiles == 1) perfil. @else perfiles. @endif</li>
                                                    @endif
                                                    @if($plan->conference_infinity == 1)
                                                        <li>Entrevistas Ilimitadas por @if($plan->plan_time == "semestrales") 6 meses @elseif($plan->plan_time == "anuales") 12 meses @endif</li>
                                                    @elseif($plan->conference_amount > 0)
                                                        <li>{{ $plan->conference_amount }} @if($plan->conference_amount == 1)video entrevista con postulantes. @else video entrevista con postulantes. @endif</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>


                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" style=" background: #26988a; border: transparent;">Cerrar</button>
                </div>

                </div>
            </div>
        </div>
        <section class="ofertas">
            <h3  class=" text-center text-azul">Empresas que <strong><u>publican con nosotros</u></strong></h3>
            <div class="container ofertas-opciones">
                <div class="row ofertas-opciones-row">
                    
                    @foreach(App\LandingBusiness::all() as $landing)
                        <div class="col-md-2 ofertas-opciones-item">
                            <a href="#"> 
                                <p class="text-center">
                                    <img style="width: 100%;" src="{{ $landing->image }}">
                                </p>
                            </a>
                        </div>
                    @endforeach
                    
                
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
                @foreach(App\Notice::orderBy("id", "desc")->take(4)->get() as $notice)
                <div class="col-md-3 opcion-en-web-et-container-col">
                    <a href="{{ url('/noticia/'.$notice->slug) }}">
                        <div class="opcion-en-web-et-container-col">
                            <!--<div class="opcion-en-web-et-container-col-box"></div>-->
                            <img src="{{ $notice->image }}" style="width: 100%;" alt="">
                        </div>
                        <h6 class="opcion-en-web-et-container-col_h6">{{ $notice->title }}</h6>
                    </a>
                </div>
                @endforeach
                {{--<div class="col-md-3 opcion-en-web-et-container-col">
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
                </div>--}}
            </div>
        </div>
      </section>
      <section class="buscar-empleo-localizacion mb-2">
        <div class="container">
            <!--<h5 class="buscar-empleo-localizacion_h5"> Buscar empleos por localización</h5>-->
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item ">
                <a class="nav-link link-tab-opcion-en-web active" data-toggle="tab" href="#home">Localización</a>
                </li>
                <li class="nav-item">
                <a class="nav-link link-tab-opcion-en-web" data-toggle="tab" href="#menu2">Categorias</a>
                </li>
                
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                    <h3>Localización</h3>
                    {{-- <a href="#" onclick="jobsInCommunes('{{ $commune->id }}')">{{ $commune->name }}</a> --}}
                    <div class="row categorias-row" id="communes-dev">
                        <div class="col-md-3 categorias-row-col-3">
                            <ul>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" @click="fetchCommunes(1)" data-toggle="modal" data-target="#communesModal">Arica Parinacota</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" @click="fetchCommunes(2)" data-toggle="modal" data-target="#communesModal">Tarapacá</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" @click="fetchCommunes(9)" data-toggle="modal" data-target="#communesModal">Maule</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" @click="fetchCommunes(13)" data-toggle="modal" data-target="#communesModal">Los Ríos</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 categorias-row-col-3">
                            <ul>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" @click="fetchCommunes(3)" data-toggle="modal" data-target="#communesModal">Antofagasta</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" @click="fetchCommunes(4)" data-toggle="modal" data-target="#communesModal">Atacama</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" @click="fetchCommunes(10)" data-toggle="modal" data-target="#communesModal">Ñuble</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" @click="fetchCommunes(14)" data-toggle="modal" data-target="#communesModal">Los Lagos</a></li>

                            </ul>
                        </div>                        
                        <div class="col-md-3 categorias-row-col-3">
                            <ul>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" @click="fetchCommunes(5)" data-toggle="modal" data-target="#communesModal">Coquimbo</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" @click="fetchCommunes(6)" data-toggle="modal" data-target="#communesModal">Valparaiso</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" @click="fetchCommunes(11)" data-toggle="modal" data-target="#communesModal">Biobío</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" @click="fetchCommunes(15)" data-toggle="modal" data-target="#communesModal">Aisén del General Carlos Ibáñez del Campo</a></li>
                                
                            </ul>
                        </div>
                        <div class="col-md-3 categorias-row-col-3">
                            <ul>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" @click="fetchCommunes(7)" data-toggle="modal" data-target="#communesModal">Metropolitana de Santiago</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" @click="fetchCommunes(8)" data-toggle="modal" data-target="#communesModal">Libertador General Bernardo O'Higgins</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" @click="fetchCommunes(12)" data-toggle="modal" data-target="#communesModal">La Araucania</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" @click="fetchCommunes(16)" data-toggle="modal" data-target="#communesModal">Magallanes y de la Antártica Chilena</a></li>
                                

                            </ul>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="communesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Comunas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <button type="button" class="btn btn-outline-primary btn-lg btn-block" v-for="commune in communes" @click="jobsInCommunes(commune.id)">@{{ commune.name }}</button>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                            
                    </div>
                </div>
               
                <div id="menu3" class="container tab-pane fade"><br>
                <h3>Categorias</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
                <div id="menu2" class="container tab-pane fade"><br>
                    <div class="row categorias-row">
                        <div class="col-md-3 categorias-row-col-3">
                            <ul>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(1)">Administración</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(2)">Almacenamiento</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(2)">Atención de Clientes</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(4)">Arte / Diseño</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(5)">Call-Center</a></li>
                                
                            </ul>
                        </div>
                        <div class="col-md-3 categorias-row-col-3">
                            <ul>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(7)">Compras / Comercio Exterior</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(8)">Comunicaciones</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(9)">Contabilidad</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(10)">Construcción</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(11)">Directores</a></li>
                                
                            </ul>
                        </div>                        
                        <div class="col-md-3 categorias-row-col-3">
                            <ul>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(13)">Enferemería</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(14)">Gerentes</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(15)">Hotelería</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(16)">Informática</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(17)">Ingeniería</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 categorias-row-col-3">
                            <ul>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(18)">Investigación</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(19)">Logística</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(20)">Manufactura</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(21)">Mantenimiento</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(22)">Marketing</a></li>

                            </ul>
                        </div>
                        <div class="col-md-3 categorias-row-col-3">
                            <ul>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(23)">Medicina</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(24)">Mercadotecnia</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(25)">Minería</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(26)">Obras</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(27)">Operarios / Operadores</a></li>

                            </ul>
                        </div>

                        <div class="col-md-3 categorias-row-col-3">
                            <ul>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(28)">Producción</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(29)">Publicidad</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(30)">Recursos Humanos</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(31)">Reparaciones</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(32)">Técnicos</a></li>

                            </ul>
                        </div>

                        <div class="col-md-3 categorias-row-col-3">
                            <ul>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(33)">Tele-comunicaciones</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(34)">Tele-mercadeo</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(35)">Transporte</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(36)">Turismo</a></li>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(37)">Ventas</a></li>

                            </ul>
                        </div>

                        <div class="col-md-3 categorias-row-col-3">
                            <ul>
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" onclick="categorySearch(38)">Servicios Generales, Aseo y Seguridad</a></li>

                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="" onclick="categorySearch(39)">Otros</a></li>       
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(6)">Calidad</a></li>                         
                                <li class="categorias-row-col-3_li"><a class="categorias-row-col-3_a" href="#" onclick="categorySearch(12)">Docentes / Educadores</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        

      </section>  
      <section class="nosotros">

        <!-- Modal -->
        <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Términos y condiciones</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center">
                            POLITICA DE PRIVACIDAD, PROTECCIÓN DE DATOS E INFORMACION Y TERMINOS DE CONDICIONES DE 
                        </h4>
                        <h3 class="text-center">
                            ENCONTRETRABAJO.CL
                        </h3>

                        <p class="text-justify">
                            El presente contrato establece las responsabilidades de cada agente de esta interacción jurídica y las condiciones de la misma, en relación a los datos personales de quienes, siendo usuarios de este Portal, las personas naturales, (en el texto: <strong><i>“Candidato”</i></strong>, <strong><i>“Usuario Particular”</i></strong> u <strong><i>“Oferente de Trabajo”</i></strong>)  que en su calidad de <strong>Buscadores</strong> de </strong>Ofertas</strong> rastrean empleos y servicios relacionados, accediendo y/o utilizando los servicios del portal web de empleo, ingresando a nuestra página web <strong>ENCONTRETRABAJO.CL</strong>, poniendo sus datos a disposición de quienes los requieren a través del Portal, empleando sus servicios de Colocación Laboral, y de los <strong>Oferentes</strong> de <strong>Emolumentos</strong> o </strong>Remuneraciones</strong>, personas naturales o jurídicas, que en calidad de potenciales empleadores utilizan el Portal para seleccionar Recurso Humano, reclutando trabajadores postulantes y analizando sus datos académicos, laborales, familiares e individuales, evaluándolos; y también cómo se recopilan, comparten y tratan los referidos datos de carácter sensiblemente personal (en adelante, los <strong>“Datos Personales”</strong> o <strong>“Datos Personales de los Candidatos”</strong>). Además se establece la forma en que se recaba, organiza, distribuye y administra esta información relevante. Así mismo se reconocen los derechos de esos <strong>usuarios</strong> y el modo en que pueden ejercerlos, haciendo valer las facultades que la ley les concede.  Derechos que importan para <u>EncontréTrabajo Valores Cruciales</u>.
                        </p>

                        <h5>I.- RESPONSABILIDADES CIVILES Y PENALES</h5>

                        <p class="text-justify">
                            El Código Civil de Chile en su artículo 44 dice: “El dolo consiste en la intención positiva de inferir injuria a la persona o propiedad de otro.” Es decir, la definitiva intencionalidad de dañar o producir perjuicio a una persona natural o jurídica, o a los bienes sobre los que recae su derecho de dominio o propiedad. 
                        </p>

                        <p class="text-justify">
                            De otro lado, el Código Penal establece en su artículo 1 estable: <i>“Es delito toda acción u omisión voluntaria penada por la ley. Las acciones u omisiones penadas por la ley se reputan siempre voluntarias, a no ser que conste lo contrario.”</i>
                        </p>

                        <p class="text-justify">
                            Con arreglo a la norma jurídica chilena, la responsabilidad dolosa, civil y/o penal, será del agente que bajo voluntariedad decida hacer mal uso de la información que obtenga en este Sitio Web. Ante el evento de que el injusto se produzca a partir de los datos recabados en nuestro Portal y de que esa conducta dolosa vulnere a la persona natural o jurídica que entregó aquella información en nuestra plataforma o dañe su patrimonio o su honra e integridad, física y/o síquica, el agraviado podrá hacer valer sus derechos, ocurriendo a los Tribunales de la República, en la forma estatuida por la Constitución y las leyes, para perseguir las responsabilidades tales contra quienes resultaren ser responsables, pero no contra el Prestador del Servicio de Colocación Laboral, en la especie <strong>Encontré-Trabajo</strong>, <strong>E-T</strong>, o <strong>Prestador de Servicios</strong>, o <strong>Servidor</strong>, porque esa responsabilidad no será en ese evento de este Prestador y porque en este acto el usuario viene en renunciar toda acción judicial de esos órdenes, sea cual fuere el tipo de acción, civil, penal u otro carácter, no la podrá ejercer en contra del Servidor sólo por el hecho lícito de haber publicado en su Portal Web datos usados después para un ilícito por un tercero. 
                        </p>

                        <h5>II.- PRESTADOR SERVICIOS ENCONTRE-TRABAJO</h5>

                        <p class="text-justify">1) Nombre: <strong>ENCONTRÉ-TRABAJO, SOCIEDAD DE RESPONSABILIDAD LIMITADA</strong></p>

                        <p class="text-justify">2) Datos registrales: PORTALES WEB. ACTIVIDADES DE CONSULTARÍA DE GESTIÓN. SERVICIOS DE PUBLICIDAD PRESTADOS POR EMPRESAS. ACTIVIDADES DE AGENCIAS DE EMPLEO. ACTIVIDADES DE AGENCIAS DE EMPLEO TEMPORAL (INCLUYE EMPRESAS DE SERVICIOS TRANSITORIOS). OTRAS ACTIVIDADES DE DOTACIÓN DE RECURSOS HUMANOS.</p>

                        <p class="text-justify">
                            3) Domicilio: la Sociedad fijará domicilio en la comuna de SAN MIGUEL, Región METROPOLITANA DE SANTIAGO. 
                        </p>

                        <p class="text-justify">
                            4) Contacto: <strong>formulario de contacto.</strong>
                        </p>

                        <p class="text-justify">
                            5) DURACIÓN: la Sociedad durará 20 años desde la fecha de la escritura de constitución, con plazos renovables de 20 años.
                        </p>

                        <h5>III.- DATOS A RECABAR</h5>

                        <p class="text-justify">
                            Antecedentes identificatorios del usuario, que pueden ser relevantes para su colocación laboral y útiles para su ubicación.
                        </p>

                        <p class="text-justify">
                            Si se contrata Servicio de Terceros (adhiriendo a nuestras condiciones de uso) para crear una cuenta, y estando habilitado en el portal web, recibiremos Datos Personales a través de este servicio, pero sólo si el usuario ha dado tu consentimiento a la opción de compartir tus Datos con nosotros y con terceros. 
                        </p>

                        <p class="text-justify">
                            Se podrá anexaren el perfil datos académicos, experiencia laboral y aptitudes, preferencias, intereses, una fotografía, ciudad o región, pudiendo subir C.V. en formato Word o Pdf.
                        </p>

                        <p class="text-justify">
                            Asimismo, recibimos datos de tus dispositivos y redes, incluidos los datos de ubicación, información sobre tu dirección IP, servidor proxy, sistema operativo, navegador web y complementos. Y recopilamos datos a través de cookies de la forma que se describe en nuestra Política de Cookies.
                        </p>

                        <h5>IV.- FINALIDADES Y FUNDAMENTO JURÍDICO</h5>

                        <p class="text-justify">
                            El objetivo de <strong>ENCONTRÉ-TRABAJO</strong>, al prestar los servicios ofrecidos en el portal web de Encontré-Trabajo.cl, es establecer el contacto entre Candidatos u Oferentes de Trabajo y Empleadores, naturales o jurídicos, o Empresas Reclutadoras, Oferentes de Contrato y Remuneración, brindando herramientas y servicios que apoyan la Colocación de Empleo.
                        </p>

                        <p class="text-justify">
                            Los Datos Personales que el interesado nos facilita al registrarse y/o utilizar nuestro portal web y/o aplicación móvil serán destinados para las siguientes finalidades:
                        </p>

                        <p class="text-justify">
                            A.- Gestión de servicios en:
                        </p>

                        <p class="text-justify">
                            a) Creación de una cuenta en el portal web Encontré-Trabajo.
                        </p>

                        <p class="text-justify">
                            b) Hacer un puente entre los Oferentes de Trabajo y de Contrato mediante la exposición de avisos de empleo publicados por los mismos reclutantes en el portal web. Dependiendo del nivel de privacidad elegido por el trabajador postulante los oferentes de empleo o contrato podrán acceder a datos de contacto y al C.V. 
                        </p>


                        <p class="text-justify">
                            c) Permitir búsqueda de perfil del candidato (de acuerdo al nivel de privacidad escogido) desde la base de datos de Candidatos o Usuarios Particulares registrados en nuestro portal web.
                        </p>

                        <p class="text-justify">
                            d) Edición y gestión de cada C.V. a través del área privada.
                        </p>

                        <p class="text-justify">
                            e) Recepción automática y gratuita de avisos por vía electrónica. En caso de estar disponible en el portal web se podrá solicitar la recepción de avisos a través de otros servicios o aplicaciones de terceros que sean integradas en el mismo. Dicho uso estará sujeto a las propias condiciones y políticas de privacidad de los terceros titulares, de lo que el portal web no será responsable.
                        </p>

                        <p class="text-justify">
                            f) Servicio de mensajería instantánea con los Oferentes de empleo. Cabe mencionar que al usar el formulario de contacto o el chat virtual del portal web, se estará utilizando nuestro servicio de mensajería. En ese caso los mensajes y anuncios son revisados para prevenir el fraude o un uso abusivo o inadecuado de nuestros servicios. En caso de estar disponible en el portal web podrá tener lugar la comunicación con los Oferentes de empleo mediante otros servicios de mensajería instantánea de terceros que sean integrados en el portal web si  están disponibles en los dispositivos. Dicho uso estará sujeto a sus propias condiciones y políticas de privacidad de los terceros titulares, de lo cual ENCONTRE-TRABAJO no será  responsable.
                        </p>

                        <p class="text-justify">
                            g) Gestión comercial y de servicios: recordatorios, avisos técnicos, actualizaciones, alertas de seguridad, mensajes de soporte, etc. Si se usa nuestro formulario de contacto atención al usuario, tus datos serán usados para atender las consultas o reclamaciones que se nos planteen por ese medio.
                        </p>

                        <p class="text-justify">
                            h) Envío de comunicaciones comerciales, encuestas, boletines, invitaciones a webinars, para informarte de nuestros productos, servicios y eventos, en la medida de que se haya manifestado la voluntad del cliente y su claro consentimiento al efecto.
                        </p>

                        <p class="text-justify">
                            i) Administrar la entrega anónima de información: evaluaciones de las empresas proporcionadas, revisiones de entrevistas, informes de salarios y otros contenidos útiles para el beneficio de otros usuarios del portal web.
                        </p>

                        <p class="text-justify">
                            j) Gestionar la suscripción y moderar, de forma anónima, los comentarios facilitados, en su caso, en nuestro Blog de contenidos relacionados con los servicios, actividades y productos de nuestro grupo empresarial.
                        </p>

                        <p class="text-justify">
                            k) Mejorar nuestros servicios mediante el estudio del comportamiento de cada usuario a través de cookies para adaptarlo a sus necesidades y complacencias. 
                        </p>

                        <p class="text-justify">
                            l) Mostrar publicidad inteligente. En base a los datos de la navegación individual recogida mediante el uso de cookies mostraremos publicidad personalizada y adaptada a las inclinaciones y preferencias personales de los usuarios, sólo si es que obtenemos su consentimiento para hacerlo. No se tomarán decisiones automatizadas en base a ese perfil esquematizado que pudieren producir efectos jurídicos para el usuario, en modo alguno. <strong>El perfil comercial que se elabore a través de las cookies No podrá ser utilizado por sitios de terceros para mostrar al usuario publicidad personalizada.</strong>  SI bien cada cliente podrá configurar e informar su perfil a virtud de las preferencias que van dejando sus rutas y quedando grabadas en nuestros registros, huellas que irán acumulando sets de datos necesarios para conformar ese perfil de uso interno, según lo indicado en nuestra Política de Cookies.
                        </p>

                        <p class="text-justify">
                            m) Enviar boletines y promociones con publicidad de otros. 
                        </p>

                        <p class="text-justify">
                        n) Utilizar los datos para generar información relevante que no identifica a nadie para fines analíticos y estadísticos; información que nos da un mejor conocimiento de los usuarios y nos ayuda a ofrecerles un mejor servicio.
                        </p>

                        <p class="text-justify">
                        ñ) Prevención de abusos y fraudes en el uso de nuestros servicios (actividades fraudulentas, ataques de denegación de servicios, envío de spam, hackeo de claves, etc.).
                        </p>

                        <p class="text-justify">
                        B.- Marco Legal de Gestión Comercial:
                        </p>

                        <p class="text-justify">
                        a) Transferencia de datos a organismos y autoridades públicas, únicamente cuando éstos sean requeridos por la autoridad competente, el órgano jurisdiccional, de conformidad con las disposiciones legales bajo el régimen e imperio del Derecho.
                        </p>

                        <p class="text-justify">
                        b) La base jurídica para el tratamiento de los Datos Personales confiados por nuestros Clientes es la celebración del presente contrato de adhesión entre ese Cliente y ENCONTRE-TRABAJO. 
Con arreglo al Derecho nacional de Chile es posible el celebrar esta clase de contratos con plena libertad a virtud del principio jurídico denominado Autonomía de la Voluntad, el cual descansa y se funda en la Autodeterminación individual, de una persona natural o jurídica, radicándose por tanto en el libre consentimiento del usuario, sea cual fuere su forma de vinculación e interacción con ENCONTRE-TRABAJO.

                        </p>

                        <h5>V.- PLAZO DE CONSERVACIÓN DE LOS DATOS</h5>

                        <p class="text-justify">
                        Los Datos Personales que se nos faciliten serán conservados mientras la cuenta del usuario en nuestro portal web siga activa o en la medida en que sea necesario para proporcionarle nuestros servicios, hasta que solicite supresión, y durante el tiempo necesario para cumplir nuestras obligaciones legales.
                        </p>

                        <h5>VI.- DESTINATARIOS</h5>

                        <p class="text-justify">
                        Los Datos Personales que nos proporcionen serán comunicados a la empresa ofertante o reclutadora de empleo (Usuarios Profesionales) cuando el usuario haya aplicado a un aviso posibilitando el contacto con ella o cuando fuere buscado en la base de datos del portal web (nivel de privacidad elegido). 
                        </p>

                        <p class="text-justify">
                        Por otro lado, durante el transcurso de nuestras actividades y para los mismos propósitos que los descritos en esta política de privacidad, los Datos Personales podrán ser tratados sólo cuando sea necesario por parte de nuestros proveedores de servicios especializados que coadyuvan a proporcionar nuestros servicios y tales como servicios de hosting, infraestructura de sistemas, desarrollo de software, servicio de envío de notificaciones, soporte, comercialización, marketing, etc. 
                        </p>

                        <p class="text-justify">
                        Tal como ya se expuso los Datos Personales podrán ser suministrados cuando exista una obligación legal a tal efecto.
                        </p>

                        <h5>VII.- BAJA COMUNICACIONES COMERCIALES Y ALERTAS</h5>

                        <p class="text-justify">
                        Para dejar de recibir alertas o comunicaciones comerciales se debe realizar la solicitud haciendo click en el enlace correspondiente que aparece en el pie del email recibido. En algunos supuestos será necesario indicar el motivo de dicha baja haciendo click en la opción aplicable. 
                        </p>

                        <h5>VIII.- DERECHOS</h5>

                        <p class="text-justify">
                            Como titular de los Datos Personales que tratamos de conformidad con lo especificado en la presente Política, el usuario contratante posee los siguientes derechos:
                        </p>

                        <p class="text-justify">
                        <strong>1) Acceder o recopilar sus Datos:</strong> puede solicitarnos una copia de tus Datos Personales.
                        </p>

                        <p class="text-justify">
                            <strong>2) Cambiar o rectificar Datos:</strong> puede editar parte de tus Datos Personales a través de tu área privada. Asimismo, podrá solicitarnos la modificación, actualización y/o corrección de sus Datos, cuando éstos no son precisos.
                        </p>

                        <p class="text-justify">
                            <strong>3) Rechazar, limitar, oponerse o restringir el uso de Datos:<strong> tiene derecho a solicitarnos que dejemos de usar total o parcialmente sus Datos sin necesidad de justificar tal decisión.
                        </p>

                        <p class="text-justify">
                            <strong>4) Suprimir tus Datos:</strong> puede requerirnos borrar o eliminar todos o parte de tus Datos Personales, en el mismo tenor.
                        </p>

                        <p class="text-justify">
                            <strong>5) Solicitar la portabilidad de tus Datos:</strong> cuando sea técnicamente posible puede pedir la transmisión de sus Datos a otro responsable de tratamiento, sin que ello afecte, altere o modifique la licitud del tratamiento basado en el consentimiento inicial y antelado a su decisión de traspaso.
                        </p>

                        <p class="text-justify">
                            Debe tener en cuenta que los referidos derechos están sujetos a determinadas limitaciones, tal y como establece la legislación nacional. Las solicitudes individuales correspondientes al ejercicio de los derechos mencionados terminarán de tratarse dentro del plazo asignado por las regulaciones legales pertinentes, que comienza a partir del momento en que el Prestador, ENCONTRE-TRABAJO, confirme la solicitud. 
                        </p>

                        <p class="text-justify">
                            Si desea hacer uso de cualquiera de estos derechos el usuario puede dirigirse a nosotros utilizando la información de contacto que aparece al inicio de la presente política y en el apartado gestionaremos la solicitud con arreglo a la legalidad vigente. 
                        </p>

                        <p class="text-justify">
                            En relación a los Datos Personales facilitados a las empresas ofertantes de empleo o reclutadoras (Usuarios Profesionales) con los que hayas contactado, puede ejercer sus derechos frente a los mismos y en las instancias establecidas por la ley.
                        </p>

                        <p class="text-justify">
                            <strong>IX.- SEGURIDAD</strong> El Servidor, ENCONTRE-TRABAJO, E-T, se preocupa por garantizar la seguridad y confidencialidad de los Datos Personales. Por eso, se han adoptado medidas de seguridad y medios técnicos adecuados para evitar su pérdida, mal uso o su acceso sin autorización de los usuarios. También el Prestador dispone de procedimientos de actuación ante cualquier sospecha de violación de la seguridad de los Datos Personales que tratamos. ENCONTRE-TRABAJO realizará la pertinente notificación al usuario y a la autoridad competente en caso de una violación de la seguridad de los Datos Personales, cuando así lo exija la ley. Una vez que haya recibido los Datos Personales utilizará procedimientos estrictos y medidas de seguridad para evitar todo acceso no autorizado.
                        </p>

                        <p class="text-justify">
                            Sin perjuicio de lo anterior, cabe mencionar que lamentablemente, la transmisión de información a través de Internet no es completamente segura. Aunque ha adoptado medidas de seguridad y medios técnicos para proteger los Datos Personales, no puede garantizar la total seguridad de los datos transmitidos a través de Internet. Por lo tanto, cualquier transmisión queda bajo el propio riesgo de quien acepta darla.
                        </p>

                        <h5>X.- POLÍTICA DE COOKIES</h5>

                        <p class="text-justify">
                                <strong>¿Qué son las cookies? </strong>
                        </p>

                        <p class="text-justify">
                        Una cookie es un pequeño archivo colocado en tu computadora, smartphone u otro dispositivo electrónico que habilita las funcionalidades de nuestros sitios web. Por ejemplo, las cookies nos permiten identificar tu dispositivo, ofrecerte acceso seguro a nuestros sitios webs, e incluso nos ayudan a saber si alguien intenta acceder a tu cuenta desde otro dispositivo. Las cookies también hacen seguimiento de la sesión de usuario, mejoran el tiempo de carga de una web, evitan mostrar información reiterativa y nos ayudan a mostrarte anuncios relevantes. 
                        </p>

                        <p class="text-justify">
                            <strong>¿Por qué utilizamos cookies?</strong>
                        </p>

                        <p class="text-justify">
                        Para mejorar tu experiencia de navegación como usuario, siendo la mejor manera de ofrecerte contenido personalizado y de interés a través del portal web y aplicación móvil. Asimismo, nos permiten ofrecer publicidad relevante y basada en tus intereses que generan ingresos que nos permiten mantener la gratuidad de otros servicios.
                        </p>

                        <p class="text-justify">
                            <strong>¿Qué cookies utilizamos?</strong>
                        </p>

                        <p class="text-justify">
                            Las cookies que utilizamos en esta página web/aplicación móvil son las siguientes:  <strong>1) De Autenticación</strong>: permiten mostrar la información adecuada y a personalizar tu experiencia y nos ayudan a determinar si el usuario ha accedido o no a la cuenta
                        </p>

                        <p class="text-justify">
                            <strong>2) De Funcionalidades y servicios:</strong> son esenciales para el correcto funcionamiento de los servicios. Proporcionan funcionalidades y contenidos personalizados.
                        </p>

                        <p class="text-justify">
                            <strong>3) Analíticas:</strong> Permiten monitorizar el rendimiento de nuestros sitios webs y herramienta online. Por ejemplo: analizar patrones de comportamiento, número de usuarios que acceden, secciones visitadas, duración de la navegación, crear informes estadísticos sobre el tráfico web, audiencia global.
                        </p>

                        <p class="text-justify">
                            <strong>¿Qué cookies de terceros utilizamos?</strong>
                        </p>

                        <p class="text-justify">
                            Las cookies de terceros que alojamos en nuestro portal web/aplicación móvil son las siguientes: 
                        </p>

                        <p class="text-justify">
                            <strong>1) Analíticas:</strong> Permiten monitorizar el rendimiento de nuestros sitios webs y/o herramienta, tal y como se ha indicado.
                        </p>

                        <p class="text-justify">
                            <strong>2) Publicitarias:</strong> permiten gestionar y adaptar el contenido al servicio solicitado, y los espacios publicitarios ofertados en su caso, en nuestros sitios web. Así podemos analizar comportamientos de navegación en Internet y mostrar al usuario los anuncios que mejor se adapten a sus intereses. Además, las cookies son necesarias para gestionar campañas publicitarias, mediante el seguimiento de diversas pautas como número de veces que se ha visto un anuncio, o para mejorar y gestionar la exposición de anuncios, evitando al usuario la publicidad que ya se le ha mostrado. También las cookies publicitarias permiten informar, optimizar y reportar nuestras impresiones de anuncios, otros usos de los servicios de publicidad, las interacciones con estas impresiones y servicios de publicidad repercuten en las visitas al sitio, y ofrecer publicidad basada en anteriores visitas que el usuario ha realizado a nuestra web. 
                        </p>

                        <p class="text-justify">
                            <strong>Control y desactivación de cookies</strong>
                        </p>

                        <p class="text-justify">
                            Es posible desactivar y/o eliminar las cookies, siguiendo las indicaciones del navegador de Internet. Sin embargo, debe tenerse en cuenta que, en este caso, es posible que se reduzca considerablemente la capacidad para utilizar nuestros servicios.
                        </p>

                        <h5>XI.- EDAD MÍNIMA</h5>

                        <p class="text-justify">
                            Para acceder o utilizar nuestro portal web debes tener 16 años de edad o más. Si el usuario es menor de 18 años su uso de nuestro portal web debe estar bajo la supervisión de tus padres o tutor u otro adulto responsable. Si tenemos conocimiento de que un menor de edad nos ha proporcionado información sin autorización parental eliminaremos dicha información y suprimiremos la cuenta de referido menor.
                        </p>

                        <h5>XII.- ACTUALIZACIONES</h5>

                        <p class="text-justify">
                        En E-T podemos actualizar esta Política de Privacidad mediante la publicación de una versión actualizada en el Portal Web. Si realizamos alguna modificación que consideremos que pudiera afectar a los derechos de usuarios lo notificaremos por email o mediante un aviso en nuestros sitios web.
                        </p>

                        <p class="text-justify">
                        Recomendamos que revisen de forma periódica la Política de Privacidad para estar actualizado de todas las novedades. Asimismo, declarar que el uso continuado de nuestros servicios, tras publicar o enviar un aviso acerca de nuestros cambios en esta Política de privacidad, implica que el tratamiento de tus Datos Personales tendrá lugar conforme a la Política de privacidad actualizada.
                        </p>

                        

                        <p class="text-justify">
                            Si alguien no acepta con cualquiera de los cambios goza del pleno derecho a cerrar su cuenta de usuario del portal web.
                        </p>

                        <h5>XIII.- INFORMACIÓN DE CONTACTO</h5>

                        <p class="text-justify">
                        Si un usuario desea hacer uso de cualquiera de tus derechos y si tienes alguna pregunta o queja sobre esta Política de Privacidad puede contactar con nosotros en la dirección y/o formulario de contacto indicados al comienzo.
                        </p>

                        <p class="text-justify">
                        Debe facilitarnos la mayor información posible sobre su solicitud: nombre y apellidos, dirección de correo electrónico que utilizas para nuestro portal web y los motivos de tu solicitud, especificando, en su caso, el derecho que desea ejercer. Asimismo, será necesario acompañar la documentación necesaria para sustentar la solicitud y dar trámite a la misma. 
                        </p>

                        <h3 class="text-centers">POLÍTICA DE PRIVACIDAD PARA EMPRESAS O USUARIOS PROFESIONALES</h3>

                        <p class="text-justify">
                            La presente política de privacidad explica quién es el responsable de los datos de carácter personal de los representantes, empleados y/o usuarios, de las Empresas o Entidades que van a devenir Clientes de Encontré-Trabajo (denominados <strong>“Usuarios Profesionales”</strong> u <strong>“Ofertantes de Empleo”</strong>) que actúan en representación y/o utilizan los servicios, productos y/o herramientas online del Portal, ofrecidas por Encontré-Trabajo (en el texto los <strong>“Datos Personales”</strong> o <strong>“Datos Personales de los Clientes”</strong>) y cómo se recopilan, comparten y tratan los referidos Datos <strong>Personales</strong>, así como los derechos que tienen los representantes, empleados y/o usuarios de los Clientes (en adelante, los <strong>“Usuarios de la Empresa Cliente”</strong>) a tal respecto y cómo pueden ejercerlos. Para Encontré-Trabajo es valor esencial mantener la privacidad y la seguridad de los Datos Personales de Todos sus Clientes.
                        </p>

                        <h5>I.- RESPONSABLE:</h5>

                        <p class="text-justify">
                        Responsable del tratamiento de los datos de los Usuarios de la Empresa Cliente recabados por medio de este sitio web online es <strong>Encontré-Trabajo</strong>. Sus datos son los siguientes:
                        </p>

                        <p class="text-justify">
                            1) Nombre: <strong,>ENCONTRÉ-TRABAJO, SOCIEDAD DE RESPONSABILIDAD LIMITADA</strong>
                        </p>

                        <p class="text-justify">
                            2) Datos registrales: PORTALES WEB. ACTIVIDADES DE CONSULTARÍA DE GESTIÓN. SERVICIOS DE PUBLICIDAD PRESTADOS POR EMPRESAS. ACTIVIDADES DE AGENCIAS DE EMPLEO. ACTIVIDADES DE AGENCIAS DE EMPLEO TEMPORAL (INCLUYE EMPRESAS DE SERVICIOS TRANSITORIOS). OTRAS ACTIVIDADES DE DOTACIÓN DE RECURSOS HUMANOS.
                        </p>

                        <p class="text-justify">
                            3) Domicilio: la Sociedad fijará domicilio en la comuna de SAN MIGUEL, Región METROPOLITANA DE SANTIAGO. 
                        </p>

                        <p class="text-justify">
                            4) Contacto: <strong>formulario de contacto</strong>.
                        </p>

                        <p class="text-justify">
                        5) DURACIÓN: la Sociedad durará 20 años desde la fecha de la escritura de constitución, con plazos renovables de 20 años.
                        </p>

                        <h5>II.- DATOS QUE SE RECOPILAN</h5>

                        <p class="text-justify">
                        <strong>ENCONTRÉ-TRABAJO</strong> recopila Datos Personales de los Usuarios de la Empresa Cliente para poder proporcionar a sus Clientes o Usuarios <strong>Profesionales</strong> los servicios contratados de la mejor manera posible. 
                        </p>

                        <p class="text-justify">
                        En efecto puede recopilar lo siguiente:
                        </p>

                        <p class="text-justify">
                        a) Información personal de los Usuarios de la Empresa Cliente, proporcionada en el momento de suscribirse o registrarse, de la forma que sea aplicable, para utilizar los servicios de colocación laboral; crear las distintas cuentas de usuario; publicar material o solicitar información, etc. También es posible que se solicite determinada información al Cliente cuando el Servidor preste asesoramiento en el uso de los servicios. Dicha información personal se halla en el marco de los datos civiles los que podrán ser: nombre completo, cargo, dirección de correo electrónico profesional, número de teléfono profesional y contraseña, debiendo indicar el nombre de la Empresa Cliente.
                        </p>

                        <p class="text-justify">
                        b) Detalles de las acciones que los usuarios de la Empresa Cliente llevan a cabo a través de nuestros sitios web y/o herramienta online y de la prestación de nuestros servicios, en caso de que ello resulte factible o viable en su aplicación.
                        </p>

                        <p class="text-justify">
                        c) Especificaciones de las visitas a nuestros sitios web y/o herramientas online por parte de los usuarios incluyendo datos de tráfico, dirección IP, coordenadas de ubicación, duración de la actividad y otros elementos de comunicación, sistema operativo, navegador web y los recursos a los que accedan.
                        </p>

                        <p class="text-justify">
                        Además, el Prestador recopila Datos a través de cookies, de la forma en que se describe en nuestra Política de Cookies.
                        </p>

                        <h5>III.- FINALIDADES Y LEGITIMACIÓN</h5>

                        <p class="text-justify">
                            <strong>ENCONTRÉ-TRABAJO</strong>, <strong>E-T</strong>, trata los Datos Personales con un objetivo específico y sólo aquellos Datos que son pertinentes para cumplir ese objetivo y según lo especificado en la presente Contrato de Política de Privacidad. En consecuencia, los Datos Personales de los Usuarios de la Empresa Cliente podrán ser tratados para ciertas finalidades, según sea de aplicación:
                        </p>

                        <p class="text-justify">
                        1) Prestación correcta de los servicios y atención de las consultas que pueda plantear el Cliente o para notificarle acerca de cambios en los servicios y proporcionarle información que sea relevante para el uso de los mismos.
                        </p>

                        <p class="text-justify">
                        2) Gestionar la suscripción y administrar, en forma discreta, anónima, criteriosa, los comentarios facilitados, en su caso, en nuestro Blog de contenidos relacionados con los servicios, actividades y productos de nuestro grupo empresarial.
                        </p>

                        <p class="text-justify">
                        3) Envío de comunicaciones comerciales, encuestas, boletines, invitaciones a webinars, para informar de nuestras novedades, productos, servicios, eventos, y más.
                        </p>

                        <p class="text-justify">
                        4) “Customizar”, mejorar y optimizar la experiencia del Cliente con los sitios web y/o nuestra herramienta online.
                        </p>

                        <p class="text-justify">
                        5) El envío de alertas técnicas, reportes, actualizaciones, notificaciones de seguridad y cualquier otra comunicación relativa a los servicios.
                        </p>

                        <p class="text-justify">
                        6) El atender las solicitudes de información y/o consultas efectuadas por el usuario a través del sitio web.
                        </p>

                        <p class="text-justify">
                        7) El envío de comunicaciones comerciales, boletines y/o promociones con publicidad de otros sitios web o productos de E-T y de otros socios o partners colaboradores.
                        </p>

                        <p class="text-justify">
                        8) Mejorar nuestros servicios mediante el estudio del comportamiento de los usuarios de la Empresa Cliente a través de cookies para adaptar el sitio web y/o herramienta online a sus necesidades, agrados y preferencias. El usuario puede gestionar sus cookies siguiendo las instrucciones indicadas en nuestra Política de Cookies.
                        </p>

                        <p class="text-justify">
                        9) Mostrar publicidad inteligente, en base a los datos de navegación que se recogen mediante el uso de cookies. Se mostrará publicidad personalizada adaptada a los agrados y las preferencias del usuario, siempre que se obtenga su consentimiento a ese respecto. No se podrán tomar decisiones mecanizadas en base a dicho perfil ni que produzcan efectos jurídicos al usuario. El perfil comercial que se elabore a través de las cookies <strong>no</strong> podrá ser utilizado por sitio de terceros para mostrar publicidad personalizada. Es posible configurar las preferencias según lo indicado en nuestra Política de Cookies.
                        </p>

                        <p class="text-justify">
                        10) Generar y compartir información agregada con fines analíticos y estadísticos, sin identificar a ningún usuario. Información que nos ofrezca un mejor conocimiento de los usuarios y nos permita ofrecer mejor servicio, así como crear estadísticas que puedan ser utilizadas para cualquier propósito, siempre que no identifiquen a ningún usuario de las Empresas Clientes, ni contengan Datos Personales de usuarios de E-T.
                        </p>

                        <p class="text-justify">
                        11) Prevención de abusos y fraudes en el uso de los servicios.
                        </p>

                        <p class="text-justify">
                        12) Transferencia de datos a organismos y autoridades públicas, únicamente cuando éstos sean requeridos por la autoridad competente, el órgano jurisdiccional, de conformidad con las disposiciones legales bajo el régimen e imperio del Derecho. La base jurídica para el tratamiento de los Datos Personales confiados por nuestros Clientes es la celebración del presente contrato de adhesión entre ese Cliente y ENCONTRE-TRABAJO. Con arreglo al Derecho nacional de Chile es posible el celebrar esta clase de contratos con plena libertad a virtud del principio jurídico denominado Autonomía de la Voluntad, el cual descansa y se funda en la Autodeterminación individual, de una persona natural o jurídica, radicándose por tanto en el libre consentimiento del usuario, sea cual fuere su forma de vinculación e interacción con ENCONTRE-TRABAJO.
                        </p>

                        <h5>IV.- PLAZO DE CONSERVACIÓN DE LOS DATOS</h5>

                        <p class="text-justify">
                        Los Datos Personales que se nos faciliten serán conservados mientras la cuenta del usuario en nuestro portal web siga activa o en la medida en que sea necesario para proporcionarle nuestros servicios, hasta que solicite supresión, y durante el tiempo necesario para cumplir nuestras obligaciones legales.
                        </p>

                        <h5>V.- DESTINATARIOS </h5>

                        <p class="text-justify">
                        Los Datos Personales podrán ser tratados sólo cuando sea necesario por parte de nuestros proveedores de servicios especializados que coadyuvan a proporcionar nuestros servicios, tales como servicios de hosting, infraestructura de sistemas, desarrollo de software, servicio de envío de notificaciones, soporte, comercialización, marketing, etc. 
                        </p>


                        <p class="text-justify">
                        Tal como ya se expuso los Datos Personales podrán ser suministrados cuando exista una obligación legal a tal efecto.
                        </p>

                        <h5>V.- DERECHOS</h5>


                        <p class="text-justify">
                        En relación con los Datos Personales que E-T trata para la prestación de sus servicios, el Cliente/los Usuarios de la Empresa Cliente tienen los siguientes derechos:
                        </p>


                        <p class="text-justify">
                        <strong>a) Acceder o recopilar sus datos:</strong> es posible solicitar una copia de los Datos Personales.
                        </p>


                        <p class="text-justify">
                        b) Rectificar los datos: es posible solicitar a través del área privada la rectificación de los Datos Personales facilitados.
                        </p>


                        <p class="text-justify">
                        <strong>c) Rechazar, limitar, oponerse o restringir el uso de datos:</strong> es posible solicitar que E-T deje de usar la totalidad o parte de los Datos Personales, el cliente conserva  pleno derecho a solicitarnos que dejemos de usar total o parcialmente sus Datos, sin ninguna necesidad de justificar tal decisión.
                        </p>


                        <p class="text-justify">
                        <strong>d) Suprimir sus datos:</strong> es posible solicitar borrar o eliminar todos o parte de los Datos Personales.
                        </p>


                        <p class="text-justify">
                        <strong>e) Solicitar la portabilidad de los datos:</strong> cuando sea técnicamente factible, se podrá pedir la transmisión de los Datos Personales a otro responsable de tratamiento, sin que ello afecte a la licitud del tratamiento que nació basado en el consentimiento inicial, previo a su retirada. 
                        </p>


                        <p class="text-justify">
                        Debe tener en cuenta que los referidos derechos están sujetos a determinadas limitaciones, tal y como establece la legislación nacional. Las solicitudes individuales correspondientes al ejercicio de los derechos mencionados terminarán de tratarse dentro del plazo asignado por las regulaciones legales pertinentes, que comienza a partir del momento en que el Prestador, ENCONTRE-TRABAJO, confirme la solicitud. 
                        </p>


                        <p class="text-justify">
                        Si desea hacer uso de cualquiera de estos derechos el usuario puede dirigirse a nosotros utilizando la información de contacto que aparece al inicio de la presente política y en el apartado gestionaremos la solicitud con arreglo a la legalidad vigente. 
                        </p>


                        <p class="text-justify">
                        E-T se reserva el derecho a cobrar un cargo por solicitudes posteriores que provengan de la misma persona, siempre que la legislación vigente al momento lo permita. 
                        </p>


                        <p class="text-justify">
                        Todo Usuario Profesional tendrá la facultad de ejercer sus derechos frente a cualquiera y en la forma establecida por la ley.
                        </p>

                        <p class="text-justify">
                        <strong>VI.- SEGURIDAD</strong> El Servidor, ENCONTRE-TRABAJO, E-T, se preocupa por garantizar la seguridad y confidencialidad de los Datos Personales. Por eso, se han adoptado medidas de seguridad y medios técnicos adecuados para evitar su pérdida, mal uso o su acceso sin autorización de los usuarios. También el Prestador dispone de procedimientos de actuación ante cualquier sospecha de violación de la seguridad de los Datos Personales que tratamos. ENCONTRE-TRABAJO realizará la pertinente notificación al usuario y a la autoridad competente en caso de una violación de la seguridad de los Datos Personales, cuando así lo exija la ley. Una vez que haya recibido los Datos Personales utilizará procedimientos estrictos y medidas de seguridad para evitar todo acceso no autorizado.
                        </p>

                        <p class="text-justify">
                        Sin perjuicio de lo anterior, cabe mencionar que lamentablemente, la transmisión de información a través de Internet no es completamente segura. Aunque ha adoptado medidas de seguridad y medios técnicos para proteger los Datos Personales, no puede garantizar la total seguridad de los datos transmitidos a través de Internet. Por lo tanto, cualquier transmisión queda bajo el propio riesgo de quien acepta darla.
                        </p>

                        <h5>VIII.- POLÍTICA DE COOKIES</h5>

                        <p class="text-justify">
                        <strong>¿Qué son las cookies?</strong>
                        </p>

                        <p class="text-justify">
                        Una cookie es un pequeño archivo colocado en tu computadora, smartphone u otro dispositivo electrónico que habilita las funcionalidades de nuestros sitios web. Por ejemplo, las cookies nos permiten identificar tu dispositivo, ofrecerte acceso seguro a nuestros sitios webs, e incluso nos ayudan a saber si alguien intenta acceder a tu cuenta desde otro dispositivo. Las cookies también hacen seguimiento de la sesión de usuario, mejoran el tiempo de carga de una web, evitan mostrar información reiterativa y nos ayudan a mostrarte anuncios relevantes.
                        </p>

                        <p class="text-justify">
                            <strong>¿Por qué utilizamos cookies?</strong>
                        </p>

                        <p class="text-justify">
                        Para mejorar tu experiencia de navegación como usuario, siendo la mejor manera de ofrecer al usuario contenido personalizado y de su interés a través del portal web y aplicación móvil. Asimismo, nos permiten ofrecer publicidad relevante y basada en sus intereses, lo que genera ingresos que permiten mantener otros servicios bajo gratuidad.
                        </p>

                        <p class="text-justify">
                            <strong>¿Qué cookies utilizamos?</strong>
                        </p>

                        <p class="text-justify">
                            Las cookies que utilizamos en esta página web/aplicación móvil son las siguientes:  
                        </p>

                        <p class="text-justify">
                        <strong>1) De Autenticación:</strong> permiten mostrar la información adecuada y a personalizar tu experiencia y nos ayudan a determinar si el usuario ha accedido o no a la cuenta
                        </p>

                        <p class="text-justify">
                        <strong>2) De Funcionalidades y servicios:</strong> son esenciales para el correcto funcionamiento de los servicios. Proporcionan funcionalidades y contenidos personalizados.
                        </p>

                        <p class="text-justify">
                        <strong>3) Analíticas:</strong> Permiten monitorizar el rendimiento de nuestros sitios webs y herramienta online. Por ejemplo: analizar patrones de comportamiento, número de usuarios que acceden, secciones visitadas, duración de la navegación, crear informes estadísticos sobre el tráfico web, audiencia global.
                        </p>

                        <p class="text-justify">
                                <srtong>¿Qué cookies de terceros utilizamos?</strong>
                        </p>

                        <p class="text-justify">
                        Las cookies de terceros que alojamos en nuestro portal web/aplicación móvil son las siguientes: 
                        </p>

                        <p class="text-justify">
                            <strong>1) De Autenticación:</strong> permiten mostrar la información adecuada y a personalizar tu experiencia y nos ayudan a determinar si el usuario ha accedido o no a la cuenta
                            ¿Qué cookies de terceros utilizamos?</p>

                        <p class="text-justify">
                            <strong>2) De Funcionalidades y servicios:</strong> son esenciales para el correcto funcionamiento de los servicios. Proporcionan funcionalidades y contenidos personalizados.
                        </p>

                        <p class="text-justify">
                        <strong>3) Analíticas:</strong> Permiten monitorizar el rendimiento de nuestros sitios webs y herramienta online. Por ejemplo: analizar patrones de comportamiento, número de usuarios que acceden, secciones visitadas, duración de la navegación, crear informes estadísticos sobre el tráfico web, audiencia global.
                        </p>

                        <p class="text-justify">
                            <strong>¿Qué cookies de terceros utilizamos?</strong>
                        </p>

                        <p class="text-justify">
                        Las cookies de terceros que alojamos en nuestro portal web/aplicación móvil son las siguientes: 
                        </p>

                        <p class="text-justify">
                        <strong>1) Analíticas:</strong> Permiten monitorizar el rendimiento de nuestros sitios webs y/o herramientas, tal y como se ha indicado.
                        </p>

                        <p class="text-justify">
                        <strong>2) Publicitarias:</strong> permiten gestionar y adaptar el contenido al servicio solicitado, y los espacios publicitarios ofertados en su caso, en nuestros sitios web. Así podemos analizar comportamientos de navegación en Internet y mostrar al usuario los anuncios que mejor se adapten a sus intereses. Además, las cookies son necesarias para gestionar campañas publicitarias, mediante el seguimiento de diversas pautas como número de veces que se ha visto un anuncio o para mejorar y gestionar la exposición de anuncios, evitando al usuario la publicidad que ya se le ha mostrado. También las cookies publicitarias permiten informar, optimizar y reportar nuestras impresiones de anuncios, otros usos de los servicios de publicidad. Las interacciones con estas impresiones y servicios de publicidad repercuten en las visitas al sitio y permiten ofrecer publicidad basada en anteriores visitas que el usuario ha realizado a nuestra web a partir del registro de sus rutas.
                        </p>

                        <p class="text-justify">
                                <strong>Control y desactivación de cookies</strong>
                        </p>

                        <p class="text-justify">
                            Es posible desactivar y/o eliminar las cookies, siguiendo las indicaciones del navegador de Internet. Sin embargo, debe tenerse en cuenta que, en este caso, es posible que se reduzca considerablemente la capacidad para utilizar nuestros servicios.
                        </p>

                        <h5>IX.- EDAD MÍNIMA</h5>

                        <p class="text-justify">
                            Toda la información personal facilitada por el Cliente deberá ser de usuarios que tengan la mayoría de edad legal aplicable. E-T tomará las medidas apropiadas para eliminar aquellos datos de usuarios menores de edad, que lo sean según la mayoría legal de cada país, y que hayan sido facilitados por el Cliente, cuando E-T tenga conocimiento de ello.
                        </p>

                        <h5>X.- ACTUALIZACIONES </h5>

                        <p class="text-justify">
                        En E-T podemos actualizar esta Política de Privacidad mediante la publicación de una versión actualizada en el Portal Web. Si realizamos alguna modificación que consideremos que pudiera afectar a los derechos de usuarios lo notificaremos por email o mediante un aviso en nuestros sitios web.
                        </p>

                        <p class="text-justify">
                        Recomendamos que revisen de forma periódica la Política de Privacidad para estar actualizado de todas las novedades. Asimismo, declarar que el uso continuado de nuestros servicios, tras publicar o enviar un aviso acerca de nuestros cambios en esta Política de privacidad, implica que el tratamiento de tus Datos Personales tendrá lugar conforme a la Política de privacidad actualizada.
                        </p>


                        <p class="text-justify">
                        Si alguien no acepta con cualquiera de los cambios goza del pleno derecho a cerrar su cuenta de usuario del portal web.

                        </p>

                        <h5>XI.- INFORMACIÓN DE CONTACTO</h5>

                        <p class="text-justify">
                        Si un Usuario Profesional desea hacer uso de cualquiera de tus derechos y si tiene alguna pregunta o queja sobre este Contrato y esta Política de Privacidad, nos puede contactar en la dirección y/o formulario de contacto indicados al comienzo.
                        </p>

                        <p class="text-justify">
                        Al efecto debe facilitarnos la mayor información posible sobre su solicitud: nombre y apellidos, dirección de correo electrónico que utiliza para nuestro portal web y los motivos de su solicitud, especificando en su caso el derecho que desea ejercer. Asimismo será necesario acompañar toda la documentación necesaria para sustentar la solicitud y dar trámite a la misma.
                        </p>

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

          <div class="container nosotros-container">
              <div class="row col-flex">
                    <div class="col-md-3 nosotros-container-row-col">
                        <h6 class="nosotros-container-row-col_h6">Institucional</h6>
                        <ul>
                         
                            {{--<li><a class="nosotros-container-row-col_a" href="">Contacto para personas</a> </li>--}}
                            <li><a style="cursor: pointer" class="nosotros-container-row-col_a" data-toggle="modal" data-target="#termsModal">Aviso Legal y Privacidad</a> </li>
                        </ul>
                    </div>
                    {{--<div class="col-md-3 nosotros-container-row-col">
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
                    </div>--}}
                    <div class="col-md-3 nosotros-container-row-col">
                        <img class="nosotros-container-row-col_img" src="{{ asset('assets/img/Google-play-boton-color.png') }}" alt="">
                        <img style="margin-top: 15px;" class="nosotros-container-row-col_img" src="{{ asset('assets/img/App-store-boton-color.png') }}" alt="">
                        <img style="margin-top: 15px;" class="nosotros-container-row-col_img" src="{{ asset('assets/img/Logo-footer-color.png') }}" alt="">
                    </div>
                </div>
          </div>
      </section>   
                    
@endsection

@push("scripts")

    <script>
        const devArea = new Vue({
            el: '#communes-dev',
            data() {
                return {
                    
                    communes:[]

                }
            },
            methods: {

                
                fetchCommunes(region){
                    this.communes = []
                    axios.get("{{ url('/communes/') }}"+"/"+region).then(res => {

                        this.communes = res.data.communes

                    })

                },
                fetchCategories(){

                    axios.get("{{ url('/job-categories/all') }}").then(res => {

                        this.categories = res.data.categories

                    })

                },
                jobsInCommunes(commune){
            
                    //alert(commune)
                    localStorage.setItem("encontre_trabajo_commune_search", commune)
                    window.location.href="{{ url('/search') }}"
                
                }

            },
            created(){
                
                //this.jobs()
                this.fetchRegions()
                this.fetchCategories()

                this.jobSearch = localStorage.getItem("encontre_trabajo_job_search")
                this.regionSearch = localStorage.getItem("encontre_trabajo_region_search")
                this.query()
                
            }

        })
    </script>

    <script>    
        function storeQuery(){
            
            let jobSearch = $("#job_search").val()
            let regionSearch = $("#region_search").val()
           
            if(jobSearch != null){
                localStorage.setItem("encontre_trabajo_job_search", jobSearch)
                localStorage.setItem("encontre_trabajo_region_search", regionSearch)
                window.location.href="{{ url('/jobs') }}"
            }
            
        }

        function categorySearch(id){
            
            localStorage.setItem("encontre_trabajo_category_search", id)
            window.location.href="{{ url('/search') }}"
        }


        $(document).ready(function(){

            localStorage.removeItem("encontre_trabajo_job_search")
            localStorage.removeItem("encontre_trabajo_region_search")
            localStorage.removeItem("encontre_trabajo_commune_search")

            var input = document.getElementById("job_search");

            // Execute a function when the user releases a key on the keyboard
            input.addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            //alert("event")
            if (event.keyCode === 13) {
                // Cancel the default action, if needed
                event.preventDefault();
                // Trigger the button element with a click
                storeQuery()
                //document.getElementById("myBtn").click();
            }
            });
        })

    </script>
    

@endpush