<h1>Admin</h1>

<a href="/profile">Profile</a>

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
                <th colspan="2">Actions</th>
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
                    <td>
                        @if($reservation->status != 'approved')
                            <form method="POST" action="{{ route('reservation.approve', $reservation->id) }}" style="display:inline;">
                                @csrf
                                <button type="submit">Approve</button>
                            </form>
                        @endif
                        @if($reservation->status != 'disapproved')
                            <form method="POST" action="{{ route('reservation.disapprove', $reservation->id) }}" style="display:inline;">
                                @csrf
                                <button type="submit">Disapprove</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif