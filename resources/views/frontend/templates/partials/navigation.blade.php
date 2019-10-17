{{-- Navbar --}}
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper lime darken-4">
        <a href="{{ route('homepage') }}" class="brand-logo">PerpusLavel</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        @guest
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ route('login') }}">Masuk</a></li>
                <li><a href="{{ route('register') }}">Daftar</a></li>
            </ul>
        @else
            <ul class="dropdown-trigger right hide-on-med-and-down" data-target="dropdown-user">
                <li><a href=""></a>{{ auth()->user()->name }}</li>
            </ul>
            <ul id="dropdown-user" class="dropdown-content">
                <li><a href="{{ route('home') }}">Beranda Saya</a></li>
                <li>
                    <a 
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                    >
                        Keluar
                    </a>
                </li>
            </ul>
        @endguest
        </div>
    </nav>
</div>

<ul class="sidenav" id="mobile-demo">
    @guest
        <li><a href="{{ route('login') }}">Masuk</a></li>
        <li><a href="{{ route('register') }}">Daftar</a></li>
    @else
        <li><a href="{{ route('home') }}">Beranda</a></li>
        <li>
            <a 
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
            >
                Keluar
            </a>
        </li>
    @endguest
</ul>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>