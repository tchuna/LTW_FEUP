<?php
    include_once('includes/init.php');
    include_once('database/list.php');

    $listID = $_POST['listID'];
    try {
        deleteList($listID);
    } catch (PDOException $Exception) {
        $_SESSION['error_message'] = "Failed to delete the list";
    }

    header('Location: userLists.php');
?>
