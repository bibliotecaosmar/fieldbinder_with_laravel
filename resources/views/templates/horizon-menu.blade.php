<nav>
    <ul>
        <li>
            <a href="{{ route('home') }}">home</a>
        </li>
        <li>
            <a href="{{ route('spiecie.indexer', ['id' => 1]) }}">plant</a>
        </li>
        <li >
            <a href="{{ route('spiecie.indexer', ['id' => 2]) }}">animal</a>
        </li>
        <li>
            <a href="{{ route('spiecie.indexer', ['id' => 3]) }}">insect</a>
        </li>
        <li>
            <a href="{{ route('spiecie.indexer', ['id' => 4]) }}">mushroom</a>
        </li>
        @yield('horizon-view')
    </ul>
</nav>
