<h1>Customer</h1>
<a href="/profile">Profile</a>

<h2>Transactions</h2>
<ul>
    <li><a href="{{ route('customer.rentals.index') }}">Rentals</a></li>
    <li><a href="{{ route('customer.make_reservation') }}">Make reservation</a></li>
    <li><a href="">Meal package</a></li>
</ul>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>

<h3>Reservations</h3>
@if ($reservations->isEmpty())
    <p>No reservations found.</p>
@else
    <table border="1">
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Event Date</th>
                <th>Time</th>
                <th>Location</th>
                <th>Phone</th>
                <th>Event Type</th>
                <th>Package</th>
                <th>Reservation status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->event_name }}</td>
                    <td>{{ $reservation->event_date }}</td>
                    <td>{{ $reservation->event_time }}</td>
                    <td>{{ $reservation->location }}</td>
                    <td>{{ $reservation->phone }}</td>
                    <td>{{ ucfirst($reservation->event_type) }}</td>
                    <td>{{ optional($reservation->package)->package_name ?? 'N/A' }}</td>
                    <td>{{ $reservation->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif