<?php
session_start();
$conn = mysqli_connect("localhost","root","","users0123");
if(!$conn)
{
    echo 'please check your Database connection';
}
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $carId = $_GET['id'];

    // Prepare and execute a query to fetch car details from the database
    $query = "SELECT * FROM cars WHERE CAR_ID = $carId";
    $result = mysqli_query($conn, $query);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        $car = mysqli_fetch_assoc($result); // Fetch car details as an associative array
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your stylesheet -->
</head>
<body>
    <header>
    <h1>Car Rental</a></h1>
    <?php
    $loggedin=true;
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
            $loggedin=false;

          }
          echo '
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#cars1">Cars</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                ';
                if(!$loggedin){
                echo '
                <li><a href="login.php">Login</a></li>
               
                
                <li><a href="signup.php">Sign Up</a></li>
                ';
                }
                if($loggedin){

                echo '
                <li><a href="logout.php">Logout</a></li>
                ';
                }
               echo'
                
            </ul>
        </nav>';
         ?>
    </header>
    
    <section class="car-details">
                <div class="container">
                    
                    <h2><?php echo $car['CAR_NAME']; ?></h2>
                    
                    <img src="<?php echo $car['CAR_IMG']; ?>" alt="<?php echo $car['CAR_NAME']; ?>">

                    <table class="spec-table">
                        <tbody>
                            <tr>
                                <td>Fuel Type</td>
                                <td><?php echo $car['FUEL_TYPE']; ?></td>
                            </tr>
                            <tr>
                                <td>Capacity</td>
                                <td><?php echo $car['CAPACITY']; ?></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>$<?php echo $car['PRICE']; ?>/day</td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        echo '<a href="booking.php?id='.$carId.'" class="btn">Rent Now</a>'; // Link to booking.php page with car id
                    } else {
                        echo '<a href="login.php" class="btn">Login to Rent</a>'; // Provide login link if user is not logged in
                    }
                    ?>
                </div>
            </section>
    <footer>
        <p>&copy; 2024 Car Rental. All rights reserved.</p>
    </footer>
</body>
</html>
<?php
    } else {
        echo "<p>Car details not found.</p>";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "<p>Invalid request.</p>";
}
?>