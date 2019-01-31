<!-- Sidebar -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3 class="sidebar-title">{{ env('APP_NAME') }}</h3>
    </div>

    <ul class="list-unstyled">
        <li class="{{ Request::is('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}">
                <span>
                    <i class="fas fa-home fa-fw"></i>
                    Inicio
                </span>
            </a>
        </li>
        <li class="{{ Request::is('pets') ? 'active' : '' }}">
            <a href="{{ route('pets') }}">
                <span>
                    <i class="fas fa-paw fa-fw"></i>
                    Mascotas
                </span>
            </a>
        </li>
        <li class="{{ Request::is('posts') ? 'active' : '' }}">
            <a href="{{ route('posts.index') }}">
                <span>
                    <i class="fas fa-paw fa-fw"></i>
                    Publicaciones
                </span>
            </a>
        </li>
        <li class="{{ Request::is('sites') ? 'active' : '' }}">
            <a href="{{ route('sites.index') }}">
                <span>
                    <i class="fas fa-paw fa-fw"></i>
                    Tiendas locales
                </span>
            </a>
        </li>
        {{--<li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Portfolio</a>
        </li>
        <li>
            <a href="#">Contact</a>
        </li> --}}
    </ul>
</nav>
