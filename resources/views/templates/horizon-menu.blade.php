<li class="nav-item active">
    <a class="nav-link" href="{{ route('home') }}">home</a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="{{ route('catalog.spiecies', ['niche' => 'plant']) }}">plant</a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="{{ route('catalog.spiecies', ['niche' => 'animal']) }}">animal</a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="{{ route('catalog.spiecies', ['niche' => 'insect']) }}">insect</a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="{{ route('catalog.spiecies', ['niche' => 'mushroom']) }}">mushroom</a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="{{ route('catalog.info') }}">spiecie info</a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="{{ route('catalog.lister') }}">submit data</a>
</li>