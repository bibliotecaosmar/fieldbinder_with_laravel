@include('templates.header')
        <!-- Content with logo and login panel -->
        @include('templates.sign-panel');
        <!-- Tabs of horizon menu -->
        <ul>
            @include('templates.horizon-menu')
            @yield('horizon-view')
        </ul>
        <!-- Menu for documentation of website (guide, ourproposal, etc...) -->
        <ul>
            @include('templates.sidebar-menu')
            @yield('side-view')
        </ul>
        <!-- View contents -->
        @yield('content-view')
        <!-- Contacts and info about the software -->
        @include('templates.footer')
        <!--@yield('js-view')-->
    </body>
</html>