<!-- Sidebar -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3 class="sidebar-title">{{ env('APP_NAME') }}</h3>
    </div>

    <ul class="list-unstyled">
        <li class="{{ Request::is('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}">
                <span>
                    <i class="far fa-chart-bar fa-fw"></i>
                    Resumen
                </span>
            </a>
        </li>
        <li class="{{ Request::is('pets', 'pets/*') ? 'active' : '' }}">
            <a href="{{ route('pets.index') }}">
                <span>
                    <i class="fas fa-paw fa-fw"></i>
                    Mascotas
                </span>
            </a>
        </li>
        <li class="{{ Request::is('posts', 'posts/*') ? 'active' : '' }}">
            <a href="{{ route('posts.index') }}">
                <span>
                    <i class="far fa-newspaper fa-fw"></i>
                    Publicaciones
                </span>
            </a>
        </li>
        <li class="{{ Request::is('sites', 'sites/*') ? 'active' : '' }}">
            <a href="{{ route('sites.index') }}">
                <span>
                    <i class="fas fa-store fa-fw"></i>
                    Locales
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
