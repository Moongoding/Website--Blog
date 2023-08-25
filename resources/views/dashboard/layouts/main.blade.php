@include('dashboard.layouts.header')
@include('dashboard.layouts.sidebar')

<main id="main" class="main">

    <section class="section">
        @yield('container')
    </section>

</main><!-- End #main -->

@include('dashboard.layouts.footer')
