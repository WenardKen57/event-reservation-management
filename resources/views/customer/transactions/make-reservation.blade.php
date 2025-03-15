<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            function updatePackageDetails() {
                let packages = @json($packages); // Convert Laravel collection to JSON
                let selectedPackageId = document.getElementById("package").value;
                
                let packageDetails = packages.find(pkg => pkg.id == selectedPackageId);

                if (packageDetails) {
                    document.getElementById("package_price").innerText = "Price: $" + packageDetails.price;
                    document.getElementById("package_description").innerText = "Description: " + packageDetails.description;
                } else {
                    document.getElementById("package_price").innerText = "null";
                    document.getElementById("package_description").innerText = "null";
                }
            }
            
            document.addEventListener("change", updatePackageDetails);
            updatePackageDetails();
        });
    </script>
    <title></title>
</head>
<body>
    <h1>Make reservation</h1>
    <form action="">
        @csrf
        <label for="event_name">Event name:</label>
        <input type="text" name="event_name" require><br>

        <label for="event_date">Event date:</label>
        <input type="date" name="event_date" require><br>

        <label for="event_time">Event time:</label>
        <input type="time" name="event_time" require><br> 

        <label for="event_type">Select type of event</label>
        <select name="event_type" id="event_type" require>
            <option value="wedding">Wedding</option>
            <option value="birthday">Birthday</option>
            <option value="other">Other</option>
        </select><br>

        <label for="package_id">Select package:</label>
        <select name="package_id" id="package">
            @foreach ($packages as $package)
                <option value="{{ $package->id }}">{{ $package->package_name }}</option>
            @endforeach
        </select><br>

        <p id="package_price"></p>
        <p id="package_description"></p>

        <button type="submit">Reserve</button>
    </form>

    <a href="{{ route('customer.dashboard') }}">Cancel</a>


</body>
</html>


