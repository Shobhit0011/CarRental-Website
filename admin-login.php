<?php

session_start();
$login=false;
$showError=false;


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $server="localhost";
    $username="root";
    $password="";
    $database="users0123";

    $conn=mysqli_connect($server,$username,$password,$database);

    $username=$_POST["username"];
    $password=$_POST["password"];
    $sql = "SELECT * FROM admin WHERE ADMIN_ID='$username' AND ADMIN_PASSWORD='$password'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        $login=true;
        $_SESSION['loggedin']=true;
        $row = mysqli_fetch_assoc($result);
        $admin_id = $row['ADMIN_ID'];

        // Store the admin's ID in the session variable
        $_SESSION['admin_id'] = $admin_id;
        
        header("location: admindash.php");
    }
else{
    $showError="Unauthorised access detected";
}
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            </ul>
        </nav>
    </header>
    <?php
   

   if($showError){
       echo  '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
       <strong>Error!!!   </strong>'.$showError.'
     <button type="button" id="closeAlert" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>  ';
   }
   
   ?>
    <section class="login-form">
        <h2>Admin Login</h2>
        <form action="admin-login.php" method="post">
    <input type="text" placeholder="Agency username" name="username">
    <input type="password" placeholder="Password" name="password">
    <button type="submit">Login</button>

</form>
<p>Don't have an account?<br> PLEASE REGISTER FIRST <br><a href="agency-signup.php">Sign Up</a></p>
    </section>
<br></br>
<br></br>
<br></br>
    <footer>
        <p>&copy; 2024 Car Rental. All rights reserved.</p>
    </footer>
   
</body>
</html>
