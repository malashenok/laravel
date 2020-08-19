<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ request()->routeIs('Home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('Home') }}">{{ __('Главная') }}</a>
                </li>
                <li class="nav-item {{ request()->routeIs('Category') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('Category') }}">{{ __('Категории новостей') }}</a>
                </li>
                <li class="nav-item dropdown {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('admin.index') }}"
                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ __('Администрирование') }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('admin.create') }}">
                            {{ __('Добавить новость') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('admin.download') }}">
                            {{ __('Выгрузить новости') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('admin.delete') }}">
                            {{ __('Удалить новость') }}
                        </a>
                    </div>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
