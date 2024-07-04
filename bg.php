<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Search</title>
</head>
<body>
    <h1>Flight Search</h1>

    <form method="GET" action="">
        <label for="origin">Origin:</label>
        <input type="text" id="origin" name="origin" required><br><br>

        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" required><br><br>

        <label for="departure_date">Departure Date:</label>
        <input type="date" id="departure_date" name="departure_date" required><br><br>

        <label for="return_date">Return Date:</label>
        <input type="date" id="return_date" name="return_date"><br><br>

        
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['origin']) && !empty($_GET['destination']) && !empty($_GET['departure_date'])) {
        $origin = htmlspecialchars($_GET['origin']);
        $destination = htmlspecialchars($_GET['destination']);
        $departure_date = htmlspecialchars($_GET['departure_date']);
        $return_date = !empty($_GET['return_date']) ? htmlspecialchars($_GET['return_date']) : null;

        $google_flights_url = "https://www.google.com/travel/flights?q=flights%20from%20$origin%20to%20$destination%20on%20$departure_date";
        if ($return_date) {
            $google_flights_url .= "%20return%20on%20$return_date";
        }
    ?>
        <p>Click the link below to search for flights:</p>
       <button type="submit"> <a href="<?php echo $google_flights_url; ?>" target="_blank">Search Flights</a></button>
    <?php
    }
    ?>
</body>
</html>
