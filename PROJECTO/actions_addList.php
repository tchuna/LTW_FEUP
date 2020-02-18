<?php
    include_once('includes/init.php');
    include_once('database/list.php');

    $list['name'] = $_POST['name'];
    $list['public'] = 0;
    $list['category'] = $_POST['category'];
    $list['date_due'] = $_POST['date_due'];
    $list['userID'] = $_POST['userID'];

    if (strlen($list['name']) != 0 && strlen($list['date_due']) != 0) {
        if (isset($_POST['projID']))
            $list['projID'] = $_POST['projID'];
        else
            $list['projID'] = null;

        try{
            createList($list);
        } catch (PDOException $Exception) {
            $_SESSION['error_message'] = "Failed to create a new list";
        }
    } else
        $_SESSION['error_message'] = "Failed to create a new item due to invalid or nonexistent inputs";

    if (isset($_POST['projID']))
        header('Location: fullProj.php?projID=' . $_POST['projID']);
    else
        header('Location: userLists.php');
?>
