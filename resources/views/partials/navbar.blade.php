<section class="top-nav">
    <div>
        <img src="{{ asset('assets/img/encontre-trabajo-blanco.png') }}" alt="">
    </div>
    <input id="menu-toggle" type="checkbox" />
    <label class='menu-button-container' for="menu-toggle">
        <div class='menu-button'></div>
    </label>
    <ul class="menu">
        <li><a class="item-menu_a" href="{{ url('/') }}">Inicio</a></li>
        <li><a class="item-menu_a" href="{{ url('quienes-somos') }}">Quienes Somos</a></li>
        <li><a class="item-menu_a" href="{{ url('/jobs') }}">Buscar Empleos</a></li>
        <li><a class="item-menu_a" href="{{ env('PLATFORM_URL').'/offers/create' }}"  style="color: #ffc107;">Publica tu oferta</a></li>
        <li><a class="item-menu_a" href="{{ env('PLATFORM_URL').'/register' }}">Crea tu cuenta</a></li>
        <li class="item-menu_a menu-btn-et_a_li"><a class="item-menu_a menu-btn-et_a" href="{{ env('PLATFORM_URL').'/' }}">Ingresa a tu cuenta</a></li>
    </ul>
</section> 