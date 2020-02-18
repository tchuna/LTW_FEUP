<?php
include_once('includes/init.php');

if (!isset($_SESSION['username']))
    header("Location: index.php");

include_once('database/user.php');


$user = getUserByUsername($_SESSION['username']);

include_once('templates/editProfile.php');
include_once('templates/common/footer.php');
?>
