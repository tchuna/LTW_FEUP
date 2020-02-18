<?php
include_once('includes/init.php');
include_once('database/list.php');
include_once('database/item.php');
include_once('database/project.php');

include_once('utilities.php');

$listID = $_GET['listID'];
$list = getListById($listID);
$items = getItemsOfList($listID);

$listOfProject = false;
if (isset($list['projID'])) {
    $userProjects = getProjectsOfUser($_SESSION['userID']);
    foreach ($userProjects as $proj) {
        if ($proj['projID'] == $list['projID'])
            $listOfProject = true;
    }
}

if ($list['userID'] != $_SESSION['userID'] && $list['public'] == 0 && !$listOfProject)
{
    $_SESSION['error_message'] = "Cannot access list of id " . $listID .". List is private or non-existent.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

include_once('templates/list.php');
include_once('templates/common/footer.php');
?>
