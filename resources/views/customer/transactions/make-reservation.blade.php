<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Make reservation</h1>
    <form method="post" action="{{ route('customer.store_reservation') }}">
        @csrf
        <label for="event_name">Event name:</label>
        <input type="text" name="event_name" require><br><br>

        <label for="event_date">Event date:</label>
        <input type="date" name="event_date" require><br><br>

        <label for="event_time">Event time:</label>
        <input type="time" name="event_time" require><br><br>

        <label for="location">Where will the event take place?</label>
        <input type="text" name="location" require><br><br>

        <label for="phone">Phone number (+63):</label>
        <input type="text" name="phone" require><br><br>

        <label for="guest_count">How many will attend this event?</label>
        <input type="number" name="guest_count" required><br><br>

        <label for="event_type">Select type of event:</label>
        <select name="event_type" id="event_type" require>
            <option value="wedding">Wedding</option>
            <option value="birthday">Birthday</option>
            <option value="other">Other</option>
        </select><br><br>

        <label for="package_id">Select package:</label>
        <select name="package_id" id="package">
            @foreach ($packages as $package)
                <option value="{{ $package->id }}">{{ $package->package_name }}</option>
            @endforeach
        </select><br><br>

        <p id="package_price"></p>
        <p id="package_description"></p>

        <button>Reserve</button>
    </form>

    <a href="{{ route('customer.dashboard') }}">Cancel</a>


</body>
</html>


