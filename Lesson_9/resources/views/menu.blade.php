<li class="nav-item {{ request()->routeIs('Home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('Home') }}">{{ __('Главная') }}</a>
</li>
<li class="nav-item {{ request()->routeIs('News') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('News') }}">{{ __('Новости') }}</a>
</li>
<li class="nav-item {{ request()->routeIs('Category') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('Category') }}">{{ __('Категории новостей') }}</a>
</li>
@if (!empty(Auth::user()->isAdmin))
<li class="nav-item dropdown {{ request()->routeIs('admin.news.index') ? 'active' : '' }}">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('admin.news.index') }}"
       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ __('Администрирование') }}
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <h6 class="dropdown-header">Новости</h6>
        <a class="dropdown-item" href="{{ route('admin.news.parser') }}">
            {{ __('Загрузка') }}
        </a>
        <a class="dropdown-item" href="{{ route('admin.news.index') }}">
            {{ __('Редактирование') }}
        </a>
        <a class="dropdown-item" href="{{ route('admin.news.create') }}">
            {{ __('Добавление') }}
        </a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Категории</h6>
        <a class="dropdown-item" href="{{ route('admin.category.index') }}">
            {{ __('Редактирование') }}
        </a>
        <a class="dropdown-item" href="{{ route('admin.category.create') }}">
            {{ __('Добавление') }}
        </a>
    </div>
</li>
@endif
