@include('Admin.layout.header')
@include('Admin.layout.navbar')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('Admin.layout.sidebar')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('contact')
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                        @include('Admin.layout.footer')
