<?php

function check_login($con){
    if(isset($_SESSION['user_name'])){
        $username = $_SESSION['user_name'];
        $query = "select * from users where user_name = '$username' limit 1";

        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result)>0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    header("Location: login.php");
    die;
}
function retriever($con){
    $username = $_SESSION['user_name'];
    $query = "select * from customer where user_name = '$username' limit 1 ";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result)>0){
        $user_data = mysqli_fetch_assoc($result);
        return $user_data;
    }
}
function transcation($con, $customer_fullname){
    $username = $_SESSION['user_name'];
    $query = "select * from p_transaction,customer where user_name = '$username' and customer_depositedFrom = '$customer_fullname'";
    return mysqli_query($con, $query);
}
function accountReader($name, $con){
    $query = "select * from customer where customer_fullname ='$name'";
    $result = mysqli_query($con, $query);
    return mysqli_fetch_assoc($result);
}
