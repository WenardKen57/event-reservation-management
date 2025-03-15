<h1>Customer</h1>
<a href="/profile">Profile</a>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>