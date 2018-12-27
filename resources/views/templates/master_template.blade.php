@include('templates.header')
        <!-- Content with logo and login panel -->
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light ml-0 bg-light">
                @include('templates.sign-panel')
            </nav>
        </div>
        <!-- Tabs of horizon menu -->
        <div class="container-fluid" id="horizon-menu">
            <nav class="navbar navbar-expand-lg navbar-dark ml-0 bg-success">
                <ul class="navbar-nav mr-auto">
                    @include('templates.horizon-menu')
                    @yield('horizon-view')
                </ul>
            </nav>
        </div>
        <!-- Menu for documentation of website (guide, ourproposal, etc...) -->
        <div class="container-fluid" id="sidebar">
            <nav class="navbar navbar-expand-lg navbar-dark ml-0 bg-light">
                <ul class="navbar-nav mr-auto">
                    @include('templates.sidebar-menu')
                    <!--@yield('side-view')-->
                </ul>
            </nav>
        </div>
        <!-- View contents -->
        <div class="container" id="content-view">
            @yield('content-view')
        </div>
        <!-- Contacts and info about the software -->
        @include('templates.footer')
        <script src="{{ asset('vendor/node_modules/jquery/dist/jquery.js') }}"></script>
        <script src="{{ asset('vendor/node_modules/popper.js/dist/popper.min.js') }}"></script>
        <script src="{{ asset('vendor/node_modules/bootstrap/dist/js/bootstrap.js')}}"></script>
        <!--@yield('js-view')-->
    </body>
</html>
