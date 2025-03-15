<h1>Customer</h1>
<a href="/profile">Profile</a>

<h2>Transactions</h2>
<ul>
    <li><a href="{{ route('customer.make_reservation') }}">Make reservation</a></li>
</ul>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>