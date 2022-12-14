<?php

session_start();
include("functions.php");
include("connection.php");

$user_login_data = check_login($con);
$customer_data = retriever($con);
$customer_fullname = $customer_data['customer_fullname'];
$transaction_data = transcation($con,$customer_fullname );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transactions</title>
    <link rel="stylesheet" href="http://localhost/onlinebanking/transactions.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

</head>
<body>
<div class="container">
    <header>
        <p class="logo"><a href="home.php">Anonymous Bank</a></p>
        <nav class="nav">
            <div class="nav-links" id="nav-links">
                <ul class="menu">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="transactions.php">Transactions</a></li>
                    <li><a href="payment.php">Make Payment</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>
    </header>
    <h2 class="title">Transaction <span class="color">History</span></h2>
    <div class="table">
        <table>
            <tr>
                <th>Transaction Date</th>
                <th>Deposit Amount</th>
                <th>Deposited To</th>
            </tr>
            <?php
            while ($rows = $transaction_data->fetch_assoc())
            {
                ?>
            <tr>
                <td class="data"><?php echo $rows['transaction_date']?></td>
                <td class="data">$<?php echo $rows['deposit_amount']?></td>
                <td class="data"><?php echo $rows['customer_depositedTo']?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <div class="cards">
        <div class="card">
            <a href="https://nbe.gov.et/inter-bank-daily-foreign-exchange-rate-in-usd/" target="_blank"><img src="world-currency-rates-483658563-09879331c7a94e639775474879c61cf0.png" alt="currency"></a>
        </div>
        <div class="card">
            <a href="https://www.marketwatch.com/" target="_blank"><img src="CollinCamerer-ShortSelling-0.2e16d0ba.fill-1600x810-c100.png" alt="stock market"></a>
        </div>
        <div class="card">
            <a href="" target="_blank"></a><img src="Why-do-you-need-savings-and-investment-plans.png" alt="savings">
        </div>
    </div>
</div>
<script>
    let navbar = document.querySelector('.nav');
    document.querySelector('#menu-btn').onclick = ()=>{
        navbar.classList.toggle('active')

    }
</script>
</body>
</html>
