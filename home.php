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
    <link href="http://localhost/onlinebanking/home.css" rel="stylesheet">
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
                        <li><a href="transactions.php">Transactions</a></li>
                        <li><a href="">Make Payment</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
                <i class="fa fa-bars" onclick="showMenu()"></i>
            </nav>
        </div>
        <p class="username">Welcome, <span class="color"> <?php echo $user_login_data['user_name']?></span>.</p>
        <div class="main">
            <div class="main-left">
                <p><span class="sp">Full Name:</span>  <?php echo $customer_data['customer_fullname']?></p>
                <p><span class="sp">Age:</span> <?php echo $customer_data['customer_age']?></p>
                <p><span class="sp">Email:</span> <?php echo $customer_data['customer_email']?></p>
                <p><span class="sp">Address:</span> <?php echo $customer_data['customer_address']?></p>
                <p><span class="sp">Phone Number:</span> <?php echo $customer_data['customer_phone']?></P>
            </div>
            <div class="main-right">
                <div class="frame">
                    <img src="3x4.jpg" alt="customer profile picture">
                    <p><span class="sp">Balance: $</span><?php echo $customer_data['balance']?></p>
                </div>
            </div>



        </div>
        <div class="cards">
            <div class="card">
                <a href="https://nbe.gov.et/inter-bank-daily-foreign-exchange-rate-in-usd/" target="_blank"><img src="world-currency-rates-483658563-09879331c7a94e639775474879c61cf0.jpg" alt="currency"></a>
            </div>
            <div class="card">
                <a href="https://www.marketwatch.com/" target="_blank"><img src="CollinCamerer-ShortSelling-0.2e16d0ba.fill-1600x810-c100.jpg" alt="stock market"></a>
            </div>
            <div class="card">
                <a href="" target="_blank"></a><img src="20200120-invest.webp" alt="savings">
            </div>
        </div>
    </div>


</body>
</html>
