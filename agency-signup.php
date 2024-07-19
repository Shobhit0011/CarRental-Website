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
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST["username"]; // Add username field
    $agencyName = $_POST["agencyName"];
    $contactPerson = $_POST["contactPerson"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    // Check if password and confirm password match
    if ($password !== $confirmPassword) {
        echo "Error: Password and confirm password do not match.";
        exit(); // Exit the script if passwords do not match
    }

    // Hash the password for security
    

    // Insert agency details into the database
    $sql = "INSERT INTO admin (ADMIN_ID, agencyName, contactPerson, email, ADMIN_PASSWORD)
            VALUES ('$username', '$agencyName', '$contactPerson', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("New Car Added Successfully!!")</script>';
    // Redirect to agency dashboard upon successful registration
    header("Location: admin-login.php");
    exit();
} else {
    if ($conn->errno == 1062) { // Check if the error is a duplicate entry error
        echo "Error: The username is already taken. Please choose a different one.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Agency Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
        <h1><a href="index.php">Car Rental</a></h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php">Cars</a></li>
                <li><a href="index.php">About</a></li>
                <li><a href="index.php">Contact</a></li>
                <li><a href="admin-login.php">Admin Login</a></li>
            </ul>
        </nav>
    </header>
    <section class="signup-form">
    <h2>Car Agency Registration</h2>
    <br>
    <!-- Agency registration form -->
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="username" placeholder="Agency Username" required><br><br> <!-- Added username field -->
        <input type="text" name="agencyName" placeholder="Agency Name" required><br><br>
        <input type="text" name="contactPerson" placeholder="Contact Person" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required><br><br>
        <button type="submit">Register</button>
    </form>
</section>
    <footer>
        <p>&copy; 2024 Car Rental. All rights reserved.</p>
    </footer>
</body>
</html>
