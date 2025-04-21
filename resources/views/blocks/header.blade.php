<header role="banner">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-9 social">
                    <a href="#"><span class="fa fa-twitter"></span></a>
                    <a href="#"><span class="fa fa-facebook"></span></a>
                    <a href="#"><span class="fa fa-instagram"></span></a>
                    <a href="#"><span class="fa fa-youtube-play"></span></a>

                    <div class="language-switcher">
                        <form>
                            <select class="form-select form-select-sm" onchange="location = this.value;">
                                <option value="{{ url('en' . substr(Request::getRequestUri(), 3)) }}" @if(app()->getLocale() === 'en') selected @endif>EN</option>
                                <option value="{{ url('ru' . substr(Request::getRequestUri(), 3)) }}" @if(app()->getLocale() === 'ru') selected @endif>RU</option>
                                <option value="{{ url('kz' . substr(Request::getRequestUri(), 3)) }}" @if(app()->getLocale() === 'kz') selected @endif>KZ</option>
                            </select>
                        </form>

                    </div>
                </div>

                <div class="col-3 search-top">
                    <form action="{{ route('article.search', app()->getLocale()) }}" class="search-top-form" method="GET">
                        <span class="icon fa fa-search"></span>
                        <input type="text" name="query" placeholder="{{ __('search.placeholder') }}">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container logo-wrap">
        <div class="row pt-5">
            <div class="col-12 text-center">
                <h1 class="site-logo">
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}">{{ __('menu.learn_blog') }}</a>
                </h1>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-md  navbar-light bg-light">
        <div class="container">

            @include('blocks.menu')
        </div>
    </nav>
</header>
