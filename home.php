<?php
session_start();
    include("functions.php");
    include("connection.php");

    $user_login_data = check_login($con);
    $customer_data = retriever($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link href="home.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header">
            <p class="logo">Anonymous Bank</p>
            <nav class="nav">
                <div class="nav-links" id="nav-links">
                    <i class="fa fa-times" onclick="hideMenu()"></i>
                    <ul class="menu">
                        <li><a href="">Home</a></li>
                        <li><a href="">Transactions</a></li>
                        <li><a href="">Make Payment</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
                <i class="fa fa-bars" onclick="showMenu()"></i>
            </nav>
        </div>
        <p class="username">Welcome, <?php echo $user_login_data['user_name']?>.</p>
        <div class="main">
            <div class="main-left">
                <p>Full Name:  <?php echo $customer_data['customer_fullname']?></p>
                <p>Age: <?php echo $customer_data['customer_age']?></p>
                <p>Email: <?php echo $customer_data['customer_email']?></p>
                <p>Address: <?php echo $customer_data['customer_address']?></p>
                <p>Phone Number: <?php echo $customer_data['customer_phone']?></P>
            </div>
            <div class="main-right">
                <div class="frame">
                    <img src="3x4.jpg" alt="customer profile picture">
                </div>
            </div>



        </div>
    </div>

</body>
</html>
