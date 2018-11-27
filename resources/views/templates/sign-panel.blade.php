<div>
    <img src="img/logo.jpg" alt="logo">
    <label>{{ $user ?? null }}</label>
    <a href="{{ route('user.login') }}">
        <i class="sign-panel"></i>
        <h3>Signin</h3>
    </a>
    <h3>or</h3>
    <a href="{{ route('user.register') }}">
        <i class="sign-panel"></i>
        <h3>Signup</h3>
    </a>
</div>