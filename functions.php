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

