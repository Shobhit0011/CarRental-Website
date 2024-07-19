<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users0123"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $carName = $_POST["carName"];
    $fuelType = $_POST["fuelType"];
    $capacity = $_POST["capacity"];
    $price = $_POST["price"];

    // Upload car image and save to the server
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["carImage"]["name"]);
    move_uploaded_file($_FILES["carImage"]["tmp_name"], $target_file);

    // Insert car details into the database
}

