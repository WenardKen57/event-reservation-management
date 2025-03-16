<form action="{{ route('customer.rentals.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="rental_id">Select Rental Item</label>
        <select name="rental_id" class="form-control" required>
            <option value="">-- Choose an Item --</option>
            @foreach ($rentals as $rental)
                <option value="{{ $rental->id }}">{{ $rental->item_name }} - ${{ $rental->price_per_unit }}/day</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="rental_date">Rental Date</label>
        <input type="date" name="rental_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="return_date">Return Date</label>
        <input type="date" name="return_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" class="form-control" min="1" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit Rental</button>
</form>
