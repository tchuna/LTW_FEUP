<?php
include_once('includes/init.php');

if (!isset($_SESSION['username']))
    header("Location: index.php");
    
include_once('database/project.php');


$projects = getProjectsOfUser($_SESSION['userID']);

include_once('templates/projectNames.php');
include_once('templates/common/footer.php');
?>
