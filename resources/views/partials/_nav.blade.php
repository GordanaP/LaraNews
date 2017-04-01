<nav class="navbar navbar-default main__navbar">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ route('articles.index') }}">
                <i class="fa fa-home" aria-hidden="true"></i>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @foreach ($categories as $category)
                    <li class="{{ active(str_slug($category->name), 2)}}{{ active(str_slug($category->name), 3)}}">
                        <a href="{{ route('articles.by.category', str_slug($category->name)) }}">
                            {{ ucfirst($category->name) }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                @can('create', 'App\Article')
                    <li>
                        <a href="{{ route('articles.create') }}">
                            New Article
                        </a>
                    </li>
                @endcan

                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @can('create', 'App\Article')
                                <li>
                                <a href="{{ route('home') }}">
                                    My articles
                                </a>
                            </li>
                            @endcan

                            <li>
                                <a href="#">
                                    My profile
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
