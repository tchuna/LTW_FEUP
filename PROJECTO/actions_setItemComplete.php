<?php
    include_once('database/item.php');

    $itemID = $_POST['itemID'];
    $checked = $_POST['checked'];
    try {
        updateChecked($itemID, $checked);
    } catch (PDOException $Exception) {
        $_SESSION['error_message'] = "Failed to set the checked status of the item";
        $ret['message'] = false;
        echo json_encode($ret);
        die;
    }
    $ret['message'] = true;
    echo json_encode($ret);
?>
