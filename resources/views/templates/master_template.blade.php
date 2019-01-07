@include('templates.header')
        <!-- Content with logo and login panel -->
        @include('templates.sign-panel')

        <!-- Tabs of horizon menu -->
        @include('templates.horizon-menu')

        <!-- Menu for documentation of website (guide, ourproposal, etc...) -->
        @include('templates.sidebar-menu')

        <!-- View contents -->
        @yield('content-view')

        <!-- Contacts and info about the software -->
        @include('templates.footer')
        <script src="{{ asset('vendor/node_modules/jquery/dist/jquery.js') }}"></script>
        <script src="{{ asset('vendor/node_modules/popper.js/dist/popper.min.js') }}"></script>
        <script src="{{ asset('vendor/node_modules/bootstrap/dist/js/bootstrap.js')}}"></script>
        <!--@yield('js-view')-->
    </body>
</html>
