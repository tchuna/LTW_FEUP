<?php

include_once('database/user.php');
include_once('includes/init.php');


//names gathering and concatenating
$name = htmlspecialchars($_POST["name"]);
$username = htmlspecialchars($_POST["username"]);
$email = htmlspecialchars($_POST["email"]);
$birthdate = htmlspecialchars($_POST["birthdate"]);
$address = htmlspecialchars($_POST["address"]);
$password = htmlspecialchars($_POST["password"]);
$confirmPassword = htmlspecialchars($_POST["confirmPassword"]);

if ($username != null && $password != null && ($password == $confirmPassword)) {
    $user['username'] = $username;
    $user['email'] = $email;
    $user['name'] = $name;
    $user['birthdate'] = $birthdate;
    $user['location'] = $address;
    $user['password'] = $password;

    if (updateUser($user))
    {
        $_SESSION['password']=$password;
        $_SESSION['fullname'] =$name;
    }
    else
        $_SESSION['error'] = true;

    header('Location: userMainPage.php');
}
else {
    $_SESSION['error'] = true;
}
