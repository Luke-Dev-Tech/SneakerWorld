<?php

// Make sure to get the raw POST data from php://input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the raw JSON POST data
    $jsonData = file_get_contents("php://input");

    // Check if we successfully got data
    if ($jsonData) {
        // Decode the JSON data into a PHP array (true for associative array)
        $data = json_decode($jsonData, true);

        // Check if decoding was successful
        if (json_last_error() === JSON_ERROR_NONE) {
            // Successfully decoded JSON, print the array
            echo "<pre>";
            print_r($data);  // This will display the data
            echo "</pre>";
        } else {
            // JSON decoding failed
            echo "Failed to decode JSON data.";
        }
    } else {
        // No data received
        echo "No POST data received.";
    }
} else {
    // If the request is not a POST request
    echo "Not a POST request.";
}
