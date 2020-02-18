<?php
include_once('includes/init.php');
include_once('database/user.php');
include_once('database/project.php');
include_once('utilities.php');

$projID = $_GET['projID'];

if (!userInProject($_SESSION['userID'], $projID))
{
    $_SESSION['error_message'] = "Cannot access list of id " . $listID .". List is private or non-existent.";
    die;
}

$project = getProjectById($projID);
$lists = getListsOfProject($projID);
$users = getUsersOfProject($projID);

include_once('templates/project.php');
include_once('templates/common/footer.php');
?>
