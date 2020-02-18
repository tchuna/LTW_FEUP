<?php
    include_once('includes/init.php');
    include_once('database/list.php');
    include_once('database/item.php');
    include_once('database/project.php');
    include_once('utilities.php');

    $query = $_GET['query'];
    $lists = getAllListsOfUser($_SESSION['username']);
    $projects = getProjectsOfUser($_SESSION['userID']);

    $foundLists = array();
    $foundItems = array();
    $foundProjects = array();

    foreach ($lists as $list) {
        if (strpos($list['name'], $query) !== false)
            array_push($foundLists, $list['listID']);
        $items = getItemsOfList($list['listID']);
        foreach ($items as $item) {
            if (strpos($item['content'], $query) !== false)
                array_push($foundItems, $item['itemID']);
        }
    }

    foreach ($projects as $proj) {
        if (strpos($proj['description'], $query) !== false)
            array_push($foundProjects, $proj['projID']);
    }

    include('templates/searchResults.php');
    include('templates/common/footer.php');
?>
