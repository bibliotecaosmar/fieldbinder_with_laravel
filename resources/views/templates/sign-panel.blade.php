<a>
    <label>fieldbinder</label>
</a>
@guest
<ul>
    <li>
        <a href="{{ route('user.login') }}">Signin</a>
    </li>
    <li>
        or
    </li>
    <li>
        <a href="{{ route('user.register') }}">Signup</a>
    </li>
</ul>
@endguest

@auth
<label>{{ auth()->nickname ?? auth()->name }}</label>
<div>
    <a href="{{ route('dashboard.profile') }}">
        <i></i>
        <label>Profile</label>
    </a>
    @auth('adm')
    <a href="{{ route('dashboard.manager') }}">
        <i></i>
        <label>Manage Users</label>
    </a>
    @endauth
</div>
@endauth
