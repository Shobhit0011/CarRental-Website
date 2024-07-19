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
$agency_id = $_SESSION['agency_id']
// Fetch booked cars data from the database
$sql = "SELECT * FROM booked where agency_id='agency_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Agency Dashboard</title>
</head>
<body>
    <h2>Welcome to Car Agency Dashboard</h2>
    <!-- Navigation links -->
    <ul>
        <li><a href="view-booked-cars.php">View Booked Cars</a></li>
        <li><a href="addcar.php">Add New Car</a></li>
    </ul>
</body>
</html>
