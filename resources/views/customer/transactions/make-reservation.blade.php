<h1>Make reservation</h1>
<form action="">
    <label for="event_name">Event name:</label>
    <input type="text" name="event_name" require><br>

    <label for="event_date">Event date:</label>
    <input type="date" name="event_date" require><br>

    <label for="event_time">Event time:</label>
    <input type="time" name="event_time" require><br> 

    <label for="event_type">Event type:</label>
    <select name="event_type" id="event_type" require>
        <option value="wedding">Wedding</option>
        <option value="birthday">Birthday</option>
        <option value="other">Other</option>
    </select><br>

    <button type="submit">Reserve</button>
</form>

<a href="{{ route('customer.dashboard') }}">Cancel</a>