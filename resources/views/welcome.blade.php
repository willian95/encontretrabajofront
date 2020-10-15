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
                                                    <li >Publicaciones de ofertas laborales en el portal.</li>
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
                                                    @if($plan->conference_amount > 0)
                                                    <li>{{ $plan->conference_amount }} @if($plan->conference_amount == 1)video conferencia. @else video conferencias. @endif</li>
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
                                                    <li >Publicaciones de ofertas laborales en el portal.</li>
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
                                                    @if($plan->conference_amount > 0)
                                                    <li>{{ $plan->conference_amount }} @if($plan->conference_amount == 1)video conferencia. @else video conferencias. @endif</li>
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
                                                    <li >Publicaciones de ofertas laborales en el portal.</li>
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
                                                    @if($plan->conference_amount > 0)
                                                    <li>{{ $plan->conference_amount }} @if($plan->conference_amount == 1)video conferencia. @else video conferencias. @endif</li>
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
                <li class="nav-item">
                <a class="nav-link link-tab-opcion-en-web" data-toggle="tab" href="#menu1">Salarios</a>
                </li>
                
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                    <h3>Localización</h3>
                    <div class="row categorias-row">

                        <div class="col-12">
                            <div class="accordion" id="accordionExample">
                                @foreach(App\Region::all() as $region)
                                <div class="card">
                                    <div class="card-header" id="heading{{$loop->index + 1}}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$loop->index + 1}}" aria-expanded="true" aria-controls="collapse{{$loop->index + 1}}">
                                        <h4>{{ $region->name }}</h4>
                                        </button>
                                    </h2>
                                    </div>

                                    <div id="collapse{{$loop->index + 1}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    @foreach(App\Commune::where("region_id", $region->id)->get() as $commune)
                                                        <div class="col-md-3">
                                                            <a href="#" onclick="jobsInCommunes('{{ $commune->id }}')">{{ $commune->name }}</a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                            
                    </div>
                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                    <h3>Salarios</h3>
                   <div class="row">
                        @foreach(App\Offer::where("status", "abierto")->groupBy('min_wage', 'max_wage')->take(20)->get() as $salary)
                            <div class="col-md-3">
                                ${{ number_format($salary->min_wage, 0, ",", ".") }} @if($salary->max_wage)- ${{ number_format($salary->max_wage, 0, ",", ".") }}@endif
                            </div>

                        @endforeach
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
        function storeQuery(){
            
            let jobSearch = $("#job_search").val()
            let regionSearch = $("#region_search").val()
           
            if(jobSearch != null){
                localStorage.setItem("encontre_trabajo_job_search", jobSearch)
                localStorage.setItem("encontre_trabajo_region_search", regionSearch)
                window.location.href="{{ url('/jobs') }}"
            }
            
        }

        function jobsInCommunes(commune){
            
            //alert(commune)
            localStorage.setItem("encontre_trabajo_commune_search", commune)
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