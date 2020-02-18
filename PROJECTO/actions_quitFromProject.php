<?php
    include_once('includes/init.php');
    include_once('database/project.php');

    $projID = $_POST['projID'];
    $userID = $_SESSION['userID'];

    try {
        removeFromProject($userID, $projID);
    } catch (PDOException $Exception) {
        $_SESSION['error_message'] = "Failed to quit from project";
    }

    header('Location: userMainPage.php');
?>
