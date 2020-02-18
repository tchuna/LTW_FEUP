<?php
include_once('includes/init.php');

if (!isset($_SESSION['username']))
    header("Location: index.php");

include_once('database/list.php');


$lists = getAllListsOfUser($_SESSION['username']);

include_once('templates/listNames.php');
include_once('templates/common/footer.php');
?>
