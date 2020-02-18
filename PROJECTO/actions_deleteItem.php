<?php
    include_once('includes/init.php');
    include_once('database/item.php');

    $listID = $_POST['listID'];
    $itemID = $_POST['itemID'];

    try {
        deleteItem($itemID);
    } catch (PDOException $Exception) {
        $_SESSION['error_message'] = "Failed to delete the item";
    }

    $return = 'fullList.php?listID=' . $listID;
    header('Location: ' . $return);
?>
