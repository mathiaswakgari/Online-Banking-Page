
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="index.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
</head>
<body>

<div class="login-container">
    <form action="login.php" method="post">
        <h1>Login</h1>
        <label>Username <i class="fa-solid fa-user"></i><input type="text" placeholder="Type your username" class="input" name="username"></label>
        <label>Password
            <i class="fa-solid fa-lock"></i><input type="password" placeholder="Type your password" class="input" name="password"></label>
        <input type="submit" value="LOGIN" id="login-button">
    </form>

</div>

</body>
</html>

<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = $_POST["username"];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password)){
        $query = "select * from users where user_name= '$user_name' and _password = '$password' limit 1";
        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data['_password'] === $password){
                $_SESSION['user_name'] = $user_data['user_name'];
                header("Location: home.php");
                die;
            }

        }
        else{
            header("Location: error.php");
        }
    }
}
?>
