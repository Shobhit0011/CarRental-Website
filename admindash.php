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
            text-align: center;
        }
        .but{
           
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
        .but:hover {
            background: #542288;
            transform: scale(1.1);
        }
        .add:hover {
            background: #542288;
            transform: scale(1.1);
        }
        .but a{
            color:white;
        }
        .add a{
            color:white;
        }
        .add{
            display: block;
            width: 200px;
            height: 40px;
            margin: 0 auto;
            background: #3b0f67;
            border: none;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color: #fff;
            transition: 0.4s ease;
            text-align: center;
            line-height: 40px;
            text-decoration: none;
        }
    </style>
</head>
<body>
   
        <header>
            
                <h1>CarRental</h1>
               <nav>
                    <ul>
                        <li><a href="booked.php">Booked Cars</a></li>
                        <li><a href="index.php">LOGOUT</a></li>
                    </ul>
    </nav>
    </header>    
    <br>
    <h2><strong><u>CARS</u></strong></h2>
        
        <br>
        <div class="content">
            <?php
            
            session_start();
            $admin_id = $_SESSION['admin_id'];

            $con = mysqli_connect('localhost', 'root', '', 'users0123');
            if (!$con) {
                echo 'please check your Database connection';
            }
            $query = "SELECT * FROM cars WHERE admin_id = '$admin_id'";
            $queryy = mysqli_query($con, $query);
            ?>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>CAR ID</th>
                        <th>CAR NAME</th>
                        <th>FUEL TYPE</th>
                        <th>CAPACITY</th>
                        <th>PRICE</th>
                        <th>AVAILABLE</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($res = mysqli_fetch_array($queryy)) {
                    ?>
                        <tr class="active-row">
                            <td><?php echo $res['CAR_ID']; ?></td>
                            <td><?php echo $res['CAR_NAME']; ?></td>
                            <td><?php echo $res['FUEL_TYPE']; ?></td>
                            <td><?php echo $res['CAPACITY']; ?></td>
                            <td><?php echo $res['PRICE']; ?></td>
                            <td><?php echo $res['AVAILABLE'] == 'Yes' ? 'YES' : 'NO'; ?></td>
                            <td>
                                <button type="submit" class="but" name="approve">
                                    <a href="deletecar.php?id=<?php echo $res['CAR_ID'] ?>">DELETE CAR</a>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <button class="add"><a href="addcar.php">+ ADD CARS</a></button>
        </div>
        <br>
        <footer id="contact">
    <p>&copy; 2024 Car Rental. All rights reserved.</p>
</footer>
</body>
</html>
