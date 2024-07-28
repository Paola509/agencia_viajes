<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];

    $flights = json_decode(file_get_contents('flights.json'), true);
    $results = array_filter($flights, function($flight) use ($origin, $destination, $date) {
        return $flight['origin'] === $origin && $flight['destination'] === $destination && $flight['date'] === $date;
    });

    header('Content-Type: application/json');
    echo json_encode(array_values($results));
}
?>
