<li class="nav-item active">
    <a class="nav-link" href="{{ route('home') }}">home</a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="{{ route('spiecie.indexer', ['niche' => [
                                                                'niche' => 'plant'
                                                        ]]) }}">plant</a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="{{ route('spiecie.indexer', ['niche' => [
                                                                'niche' => 'animal'
                                                        ]]) }}">animal</a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="{{ route('spiecie.indexer', ['niche' => [
                                                                'niche' => 'insect'
                                                        ]]) }}">insect</a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="{{ route('spiecie.indexer', ['niche' => [
                                                                'niche' => 'mushroom'
                                                        ]]) }}">mushroom</a>
</li>
