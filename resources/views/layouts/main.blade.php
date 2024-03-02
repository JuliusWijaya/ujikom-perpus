@include('layouts.partials.header')

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @auth
                @include('layouts.stisla.navbar')
                @include('layouts.stisla.sidebar')
            @endauth

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @auth
                        @if (Request::is('dashboard'))
                        @endif
                    @endauth

                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
            @include('layouts.partials.footer')
        </div>
    </div>
