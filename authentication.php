<?php
    include 'connection.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($connection, $username);

    $sql = "select * from login where username = '$username' and password = '$password'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1){
        echo "<h1>Login successful</h1>";}
    else{
        echo "<h1>Login Failed</h1>";
    }
    ?>