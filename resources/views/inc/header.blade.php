<nav class="navbar navbar-expand-lg text-center bg-body-tertiary " style="justify-content:center;background-color: #fff;padding-top: 10px;padding-bottom: 10px;">
        <div class="container-fluid text-center">
            <a class="navbar-brand" href="{{route('index')}}">Demis Group</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link @yield('index')" href="{{route('index')}}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('news')" href="{{route('news')}}">Новости</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('form')" href="{{route('form')}}">Связаться</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @auth()
                    <li class="nav-item">
                        <a class="nav-link @yield('home')"  href="{{route('home')}}" aria-current="page">Профиль</a>
                    </li>
                    @endauth()
                    @guest()
                    <li class="nav-item">
                        <a class="nav-link @yield('login')" href="{{ route('login') }}">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('register')" href="{{ route('register') }}">Зарегистрироваться</a>
                    </li>
                    @endguest()
                </ul>
            </div>
        </div>
    </nav>