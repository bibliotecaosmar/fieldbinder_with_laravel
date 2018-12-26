<a class="navbar-brand col-10">
    <label id="logo">fieldbinder</label>
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
    <a href="{{ route('dashboard.profile') }}">
        <i class="dropdown-button"></i>
        <label>Profile</label>
    </a>
    @auth('adm')
    <a href="{{ route('dashboard.manager') }}">
        <i class="dropdown-button"></i>
        <label>Manage Users</label>
    </a>
    @endauth
</div>
@endauth
