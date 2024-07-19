<?php
session_start();
$con = mysqli_connect("localhost","root","","users0123");
if(!$con) {
    echo 'please check your Database connection';
}

$query = "SELECT * FROM cars WHERE AVAILABLE = 'Yes'";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_SESSION['username'])) {
        echo " - ".$_SESSION['username'];
    }
    ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1><a href="index.php">Car Rental</a></h1>
    <?php
    $loggedin = false;
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
        $loggedin = true;
    }
    echo '
        <nav>
            <ul>
                <li><a href="admin-login.php">Admin Login</a></li>
                <li><a href="#home">Home</a></li>
                <li><a href="#cars1">Cars</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>';
    if(!$loggedin){
        echo '
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>';
    }
    if($loggedin){
        echo '
                <li><a href="logout.php">Logout</a></li>';
    }
    echo '
            </ul>
        </nav>';
    ?>
</header>

<section id="home" class="hero">
    <div class="hero-content">
        <h2>Find Your Perfect Ride</h2>
        <form action="#cars1">
            <input type="text" placeholder="Enter location">
            <input type="date">
            <input type="date">
            <button type="submit" ><a href="#cars1" >Search</a></button>
        </form>
    </div>
</section>
<div id="cars1"class="Available">
    <br></br>
    <h2><strong><u>Available Cars</u></strong></h2>
</div>
<section id="cars" class="car-listings">
    <?php
    // Loop through each row fetched from the database and display car cards
    while($row = mysqli_fetch_assoc($result)) {
        echo '
        <div class="car-card">
            <img src="'.$row['CAR_IMG'].'">

            <h3><a href="car-details.php?id='.$row['CAR_ID'].'">'.$row['CAR_NAME'].'</a></h3>
            
            <p>$'.$row['PRICE'].'/day</p>
            <div>';
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            echo '<a href="car-details.php?id='.$row['CAR_ID'].'" class="btn">Rent Now</a>';
        } else {
            echo '<a href="login.php" class="btn">Login to Rent</a>';
        }
        echo '</div>
        </div>';
    }
    ?>
</section>

<!-- Other sections like About and Contact -->
<section id="about" class="about-section">
    <div class="container">
        <h2>About Us</h2>
        <p>Welcome to Car Rental, your trusted partner for finding the perfect vehicle for your needs. Our mission is to provide high-quality rental cars with exceptional service at competitive prices. With a wide range of vehicles to choose from and convenient booking options, we make renting a car easy and hassle-free.</p>
        <p>Whether you're traveling for business or pleasure, our dedicated team is here to help you find the ideal car to suit your budget and preferences. We pride ourselves on our commitment to customer satisfaction and strive to exceed your expectations every step of the way.</p>
    </div>
</section>

<section id="contact" class="contact-section">
    <div class="container">
        <h2>Contact Us</h2>
        <p>If you have any questions, suggestions, or feedback, please feel free to contact us using the form below. We'll get back to you as soon as possible.</p>
        <form action="#" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>
</section>

<footer id="contact">
    <p>&copy; 2024 Car Rental. All rights reserved.</p>
</footer>

<script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>

</body>
</html>
