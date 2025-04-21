<div class="collapse navbar-collapse" id="navbarMenu">
    <ul class="navbar-nav mx-auto">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('home', app()->getLocale()) }}">{{ __('menu.home') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('article.category', [app()->getLocale(), 'test']) }}">{{ __('menu.web_development') }}</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{ route('article.index', app()->getLocale()) }}" id="dropdown05" aria-haspopup="true" aria-expanded="false">{{ __('menu.categories') }}</a>

            <div class="dropdown-menu" aria-labelledby="dropdown05">
                @foreach($categories as $category)
                    <a class="dropdown-item" href="{{ route('article.category', [app()->getLocale(), $category->slug]) }}">{{ $category->title }}</a>
                @endforeach
            </div>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('about', app()->getLocale()) }}">{{ __('menu.about') }}</a>
        </li>
    </ul>

</div>
