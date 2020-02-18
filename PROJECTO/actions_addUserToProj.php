<?php
    include_once('includes/init.php');
    include_once('database/project.php');
    include_once('database/user.php');

    $projID = $_POST['projID'];
    $username = $_POST['username'];

    if (strlen($username) != 0) {
        try {
            $userID = getIdByUsername($username);
            addUserToProject($userID, $projID);
        } catch (PDOException $Exception) {
            $_SESSION['error_message'] = "Failed to add user " . $username . " to project";
        }
    } else
        $_SESSION['error_message'] = "Failed to create a new item due to invalid or nonexistent inputs";

    header('Location: fullProj.php?projID=' . $projID);
?>
