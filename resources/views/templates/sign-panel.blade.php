<a class="navbar-brand col-10">
    <h3 class="">fieldbinder</h3>
</a>
@guest
<ul class="navbar-nav mr-auto col-2">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('user.login') }}">Signin</a>
    </li>
    <li class="nav-item active">
        or
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('user.register') }}">Signup</a>
    </li>
</ul>
@endguest

@auth
<div class="col-2">

</div>
<label class="user">{{ auth()->nickname ?? auth()->name }}</label>
<div>
    <a href="{{ route('content.profile') }}">
        <i class="dropdown-button"></i>
        <label>Profile</label>
    </a>
    @auth('adm')
    <a href="{{ route('adm.manager') }}">
        <i class="dropdown-button"></i>
        <label>Manage Users</label>
    </a>
    @endauth
</div>
@endauth