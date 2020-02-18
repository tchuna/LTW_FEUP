<?php
    include_once('includes/init.php');
    include_once('database/list.php');

    $listID = $_POST['listID'];
    $projID = $_POST['projID'];

    try {
        removeListFromProj($listID, $projID);
    } catch (PDOException $Exception) {
        $_SESSION['error_message'] = "Failed to remove the list from the project";
    }

    header('Location: fullProj.php?projID=' . $projID);
?>
