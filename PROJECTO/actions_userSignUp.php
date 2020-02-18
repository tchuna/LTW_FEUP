<?php

include_once('database/user.php');
include_once('includes/init.php');

$_SESSION['invalid_user'] = 0;

//names gathering and concatenating
$name = htmlspecialchars($_POST["name"]);
$lastname = htmlspecialchars($_POST["lastname"]);
$fullname = $name . ' ' . $lastname;

$username = htmlspecialchars($_POST["username"]);
$email = htmlspecialchars($_POST["email"]);

$birthdate = htmlspecialchars($_POST["birthdate"]);
$address = htmlspecialchars($_POST["address"]);

$password = htmlspecialchars($_POST["password"]);
$confirmPassword = htmlspecialchars($_POST["confirmPassword"]);

//create associative array of user
$user['username'] = $username;
$user['email'] = $email;
$user['name'] = $fullname;
$user['birthdate'] = $birthdate;
$user['location'] = $address;

if ($username != null && $password != null) {
    $result = getUserByUsername($username);
    $number_of_rows = sizeof($result);
    if ($number_of_rows == 1) {
        createUser($user, $password);
        $userID = getIdByUsername($user['username']);
        $_SESSION['userID']=$userID;
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        $_SESSION['fullname'] =$fullname;
        header('Location: userMainPage.php');
        $_SESSION['invalid_user'] = 0;
    } else {
        $username = null;
        $password = null;
        $_SESSION['invalid_user'] = 1;
        header('Location: index.php');
    }
}
