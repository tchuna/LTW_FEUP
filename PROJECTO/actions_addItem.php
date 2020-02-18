<?php
    include_once('includes/init.php');
    include_once('database/item.php');

    $listID = $_POST['listID'];

    $item['content'] = $_POST['content'];
    $item['listID'] = $listID;
    $item['checked'] = 0;
    $item['image'] = 'null';

    if (strlen($item['content']) != 0) {
        try {
            createItem($item);
        } catch (PDOException $Exception) {
            $_SESSION['error_message'] = "Failed to create a new item";
        }
    } else
        $_SESSION['error_message'] = "Failed to create a new item due to invalid or nonexistent inputs";

    $return = "fullList.php?listID=" . $listID;
    header('Location: ' . $return);
?>
