<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

    <head>
        @include('partials._head')
    </head>

    <body>
        <div id="app">

            <!-- Navbar -->
            <section class="container navbar__container">
                @include('partials._nav')
            </section>

            <!-- Main content -->
            <section class="container main__container">

                @yield('messages')

                <div class="row">

                    <main class="col-md-12">
                        @yield('content')
                    </main>

                </div>
            </section>

            <!-- Footer -->
            <section class="container footer__container">
                @include('partials._footer')
            </section>
        </div>

        <!-- Scripts -->
        @include('partials._scripts')
    </body>

</html>