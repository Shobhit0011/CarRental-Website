<?php 

$con = mysqli_connect('localhost','root','','users0123');
if(!$con)
{
    echo 'please check your Database connection';
}

session_start();
 
$carid = $_GET['id'];
$sql="select * from cars where CAR_ID='$carid'";
$cname = mysqli_query($con,$sql);
$email = mysqli_fetch_assoc($cname);



$value = $_SESSION['username'];
$sql="select * from users where username='$value'";
$name = mysqli_query($con,$sql);
$rows=mysqli_fetch_assoc($name);
$carprice=$email['PRICE'];

if(isset($_POST['book'])){
       
    $bplace=mysqli_real_escape_string($con,$_POST['place']);
    $bdate=date('Y-m-d',strtotime($_POST['date']));
    $dur=mysqli_real_escape_string($con,$_POST['dur']);
    $phno=mysqli_real_escape_string($con,$_POST['ph']);
    $des=mysqli_real_escape_string($con,$_POST['des']);
    $rdate=date('Y-m-d',strtotime($_POST['rdate']));
         
    if(empty($bplace) || empty($bdate) || empty($dur) || empty($phno) || empty($des) || empty($rdate)){
        echo '<script>alert("Please fill all the fields")</script>';
    } else {
        if($bdate < $rdate) {
            $price = ($dur * $carprice);
            $sql="INSERT INTO booking (CAR_ID,car_name,BOOK_PLACE, BOOK_DATE, DURATION, PHONE_NUMBER, DESTINATION, PRICE, RETURN_DATE) 
            VALUES ('$carid','{$email['CAR_NAME']}', '$bplace', '$bdate', '$dur', '$phno', '$des', '$price', '$rdate')";
            $result = mysqli_query($con,$sql);
            
            if($result){
                $_SESSION['email'] = $uemail;
                echo '<script>alert("Booking successful!"); window.location.href = "index.php";</script>';
            } else {
                echo '<script>alert("Please check the connection")</script>';
            }
        } else {
            echo '<script>alert("Please enter a correct return date")</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAR BOOKING</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #18032d;
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style-type: none;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        .car-listings {
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .Available h2 {
            text-align: center;
        }

        .car-card {
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 10px;
            text-align: center;
        }

        .car-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        nav ul {
            list-style-type: none;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        /* New CSS Styles */

        header h1 a {
            color: #ff6600;
        }

        nav a {
            color: #ff6600;
        }

        nav a:hover {
            color: #fff;
        }

        .hero {
            background-image: url('hero-background.jpg');
            background-size: cover;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .hero-content {
            text-align: center;
            font-size: 24px;
        }

        .hero-content form {
            font-size: 18px;
        }

        .hero-content input[type="text"],
        .hero-content input[type="date"],
        .hero-content button {
            font-size: 16px;
            padding: 10px 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6020a0;
            color: #fdfcfc;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn a {
            color: rgb(248, 247, 248);
        }

        .btn:hover {
            background-color: #af3ced;
            color: #fff;
        }

        .btn a:hover {
            color: #fdfcfc;
        }

        .register {
            background-color: rgba(255, 255, 255, 0.8);
            width: 400px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin: 0 auto;
            margin-top: 50px;
        }

        .register h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .register label {
            font-size: 18px;
            font-style: italic;
            color: #white;
        }

        .register input[type="text"],
        .register input[type="number"],
        .register input[type="tel"],
        .register input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .register input[type="submit"] {
            width: 100%;
            background-color: #3b0f67;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .register input[type="submit"]:hover {
            background-color: #542288;
        }
        
    </style>
 
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
                
            </ul>
        </nav>
    </header>
<div class="register">
    <h2>BOOKING</h2>
    <form id="register" method="POST">
        <h2>CAR NAME : <?php echo $email['CAR_NAME']?></h2>
        <label>BOOKING PLACE :</label><br>
        <input type="text" name="place" id="name" placeholder="Enter Your Destination"><br>

        <label>BOOKING DATE :</label><br>
        <input type="date" name="date" id="datefield" min='1899-01-01' placeholder="ENTER THE DATE FOR BOOKING"><br>

        <label>DURATION :</label><br>
        <input type="number" name="dur" min="1" max="30" id="name" placeholder="Enter Rent Period (in days)"><br>

        <label>PHONE NUMBER :</label><br>
        <input type="tel" name="ph" maxlength="10" id="name" placeholder="Enter Your Phone Number"><br>
            
        <label>DESTINATION :</label><br>
        <input type="text" name="des" id="name" placeholder="Enter Your Destination"><br>

        <label>Return date :</label><br>
        <input type="date" name="rdate" id="dfield" min='1899-01-01' placeholder="Enter The Return Date"><br>
        
        <input type="submit" value="BOOK" name="book">
    </form>
</div>
<footer>
        <p>&copy; 2024 Car Rental. All rights reserved.</p>
    </footer>

</body>
</html>
