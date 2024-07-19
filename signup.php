<?php
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $server="localhost";
    $username="root";
    $password="";
    $database="users0123";

    $conn=mysqli_connect($server,$username,$password,$database);

    $username=$_POST["username"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];

    
    if(empty($username) || empty($password) || empty($cpassword)){
        $showError="Please enter username and password.";
    } else {
        
        $sql_check_username = "SELECT * FROM `users` WHERE `username`='$username'";
        $result_check_username = mysqli_query($conn, $sql_check_username);
        $num_rows = mysqli_num_rows($result_check_username);
        if($num_rows > 0) {
            $showError = "Username already exists.";
        } else {
            // Check if passwords match
            if($password == $cpassword){
                $sql="INSERT INTO `users` (`username`, `password`, `date`) VALUES ('$username', '$password', current_timestamp())";
                $result = mysqli_query($conn,$sql);
                if($result){
                    $showAlert=true;
                }
            } else {
                $showError="Passwords do not match!";
            }
        }
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <div class="loginimg">
</div>
<?php
     if($showAlert){
    echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>Success!</strong> Your Account has been created.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>  ';
}
if($showError){
    echo  '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!!!   </strong>'.$showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>  ';
}

?>
    <section class="signup-form">
        <h2>Sign Up</h2>
        <form action="signup.php" method="post">
            <input type="text" placeholder="Full Name" name="username">
            <input type="password" placeholder="Password" name="password">
            <input type="password" placeholder="Confirm Password" name="cpassword">
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </section>
    <br></br>
    <br></br>
    <br></br>
    <footer>
        <p>&copy; 2024 Car Rental. All rights reserved.</p>
    </footer>
</body>
</html>
