<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Add CSS styles here */
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        

        .content-table {
            background-color: rgba(0, 0, 0, 0.6);
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            color: #fff;
            font:bold;
        }

        .content-table th,
        .content-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #dddddd;
        }

        .content-table thead tr {
            color: #fff;
            font:bold;
            text-align: center;
        }

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .active-row td {
            text-align: center; /* Center-align the content in the table cells */
        }
        h1 {
            color: rgb(300, 100, 0);
        }
        h2{
            color: #6020a0;
        }
        
    </style>
</head>
<body>   
<?php

    
    $con = mysqli_connect('localhost','root','','users0123');
    if(!$con)
    {
        echo 'please check your Database connection';
    }
$query="SELECT *from booking";    
$queryy=mysqli_query($con,$query);
$num=mysqli_num_rows($queryy);


?>
<header>
       
           
            <h1>CarRental</h1>
           
           <nav>
                <ul>
                    <li><a href="admindash.php">ALL CARS</a></li>
                  <li><a href="index.php">LOGOUT</a></li>
                </ul>
</nav>
</header>

        
        <section>
           
            <div id="cars1"class="Available">
    <br></br>
    <h2><strong><u>CARS</u></strong></h2>
</div>
           <br>
            <div>
                <div>
                    <table class="content-table">
                <thead>
                    <tr>
                        
                        <th>BOOKING PLACE</th>
                        <th>BOOKING DATE</th>
                        <th>CAR</th>
                        <th>DURATION</th>
                        <th>PRICE</th>
                        <th>PHONE NUMBER</th>
                        <th>DESTINATION </th>
                        <th>Return date</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                
                while($res=mysqli_fetch_array($queryy)){
                
                
                ?>
                <tr  class="active-row">
                    
                    <td><?php echo $res['BOOK_PLACE'];?></php></td>
                    <td><?php echo $res['BOOK_DATE'];?></php></td>
                    <td><?php echo $res['car_name'];?></php></td>
                    <td><?php echo $res['DURATION'];?></php></td>
                    <td><?php echo $res['PRICE'];?></php></td>
                    <td><?php echo $res['PHONE_NUMBER'];?></php></td>
                    <td><?php echo $res['DESTINATION'];?></php></td>
                    <td><?php echo $res['RETURN_DATE'];?></php></td>
                    
                    
                </tr>
               <?php } ?>
                </tbody>
                </table>
                <br>
               
                </div>
            </div>
            <br></br>
         <br></br>
         <br></br>
         
        </div>
                </section>
        <footer id="contact">
    <p>&copy; 2024 Car Rental. All rights reserved.</p>
</footer>

</body>
</html>