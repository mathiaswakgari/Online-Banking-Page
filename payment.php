

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transactions</title>
    <link rel="stylesheet" href="http://localhost/onlinebanking/payment.css">
</head>
<body>
<div class="container">
    <div class="header">
        <p class="logo">Anonymous Bank</p>
        <nav class="nav">
            <div class="nav-links" id="nav-links">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul class="menu">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="transactions.php">Transactions</a></li>
                    <li><a href="payment.php">Make Payment</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
    </div>
    <h2 class="title">Payme<span class="color">nts</span></h2>
    <div class="form">
        <p>Transfer Page</p>
        <form action="payment.php" method="post">
            <label>Person to be transferred to(Full-Name): <input type="text" required placeholder="someone" name="name"></label>
            <label>Amount($): <input type="number" placeholder="0.00" required name="amount"></label>
            <input type="submit" value="Transfer" class="submit">
            <p class="result"><?php

                session_start();
                include("functions.php");
                include("connection.php");

                $user_login_data = check_login($con);
                $customer_data = retriever($con);
                $customer_fullname = $customer_data['customer_fullname'];
                $transaction_data = transcation($con,$customer_fullname );
                ?>
                <?php
                if(isset($_POST['name']) && isset($_POST['amount'])){
                    $name = $_POST['name'];
                    $amount = $_POST['amount'];
                    $amount = (float)$amount;
                    if ($amount > balanceReader($con)['balance'] ){
                        echo("Transfer Incomplete. Low on Balance.");
                    }
                    else if($amount <= 0){
                        echo("Transfer Incomplete. Invalid Amount.");
                    }
                    else{
                        if(accountReader($name, $con)){
                            writer($con, $name, $amount, $customer_fullname);
                            $balance = balanceReader($con)['balance'];
                            $balance = number_format($balance);
                            echo ("Wire Transfer Complete. Your Balance now is: $$balance");
                        }
                        else{
                            echo ("Account doesn't exist");
                        }

                    }

                }
                ?></p>
        </form>



    </div>
    <!--<div class="cards">
        <div class="card">
            <a href="https://nbe.gov.et/inter-bank-daily-foreign-exchange-rate-in-usd/" target="_blank"><img src="world-currency-rates-483658563-09879331c7a94e639775474879c61cf0.jpg" alt="currency"></a>
        </div>
        <div class="card">
            <a href="https://www.marketwatch.com/" target="_blank"><img src="CollinCamerer-ShortSelling-0.2e16d0ba.fill-1600x810-c100.jpg" alt="stock market"></a>
        </div>
        <div class="card">
            <a href="" target="_blank"></a><img src="20200120-invest.webp" alt="savings">
        </div>
    </div>-->
</div>
<script>
    const submit = document.querySelector('.submit')
    const form = document.querySelector('.form')
    submit.onclick = function (){
        form.style.height = "50%";
    }
</script>
</body>
</html>

