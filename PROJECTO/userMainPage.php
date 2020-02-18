<?php
include_once('includes/init.php');
include_once('database/user.php');
include_once('userInfo.php');

if (!isset($_SESSION['username']))
    header("Location: index.php");

$user = getUserByUsername($_SESSION['username']);
$age = calculateAge($user['birthdate']);

include_once('templates/userProfile.php');
include_once('templates/userOptions.php');
include_once('templates/common/footer.php');
?>
