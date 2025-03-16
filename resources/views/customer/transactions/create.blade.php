@extends('layouts.app')

@section('content')
<div class="container">
    <h2>New Transaction</h2>
    
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="event_id">Select Event (Optional)</label>
            <select name="event_id" class="form-control">
                <option value="">-- Select Event --</option>
                @foreach ($events as $event)
                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="rental_id">Select Rental (Optional)</label>
            <select name="rental_id" class="form-control">
                <option value="">-- Select Rental --</option>
                @foreach ($rentals as $rental)
                    <option value="{{ $rental->id }}">{{ $rental->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="meal_package_id">Select Meal Package (Optional)</label>
            <select name="meal_package_id" class="form-control">
                <option value="">-- Select Meal Package --</option>
                @foreach ($mealPackages as $mealPackage)
                    <option value="{{ $mealPackage->id }}">{{ $mealPackage->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit Transaction</button>
    </form>
</div>
@endsection
