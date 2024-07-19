<?php
session_start(); // Start the session

if(isset($_POST['addcar']) ){
    $admin_id = $_SESSION['admin_id']; 
    $con = mysqli_connect("localhost","root","","users0123");
    if(!$con)
    {
        echo 'please check your Database connection';
    }
   echo "<prev>";
   print_r($_FILES['image']);
   echo "</prev>";
   $img_name= $_FILES['image']['name'];
   $tmp_name= $_FILES['image']['tmp_name'];
   $folder="images/".$img_name;
   echo $folder;
   move_uploaded_file($tmp_name,$folder);
   $error= $_FILES['image']['error'];
    if($error === 0){
        $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
        $img_ex_lc= strtolower($img_ex);

        $allowed_exs = array("jpg","jpeg","png","webp","svg");
        if(in_array($img_ex_lc,$allowed_exs)){
            $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
            $img_upload_path='images/'.$new_img_name;
            move_uploaded_file($tmp_name,$img_upload_path);

                $carname=mysqli_real_escape_string($con,$_POST['carname']);

                $ftype=mysqli_real_escape_string($con,$_POST['ftype']);
                $capacity=mysqli_real_escape_string($con,$_POST['capacity']);
                $price=mysqli_real_escape_string($con,$_POST['price']);
                $available="Yes";
                $query = "INSERT INTO cars(CAR_NAME, FUEL_TYPE, CAPACITY, PRICE, CAR_IMG, AVAILABLE, ADMIN_ID) 
                      VALUES ('$carname', '$ftype', $capacity, $price, '$folder', '$available', '$admin_id')";
            $res = mysqli_query($con, $query);
                if($res){
                    echo '<script>alert("New Car Added Successfully!!")</script>';
                    echo '<script> window.location.href = "admindash.php";</script>';                }

        }else{
            echo '<script>alert("Cant upload this type of image")</script>';
            echo '<script> window.location.href = "addcar.php";</script>';   
        }
    }
    else{
        $em="unknown error occured";
        header("Location: addcar.php?error=$em");
    }

}
else{
    echo "false";
}



?>