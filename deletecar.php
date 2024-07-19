<?php

$con = mysqli_connect('localhost','root','','users0123');
if(!$con)
{
    echo 'please check your Database connection';
}
$carid=$_GET['id'];
$sql="DELETE from cars where CAR_ID=$carid";
$result=mysqli_query($con,$sql);

echo '<script>alert("CAR DELETED SUCCESFULLY")</script>';
echo '<script> window.location.href = "admindash.php";</script>';
?>