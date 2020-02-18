<?php
    include_once('includes/init.php');
    include_once('database/project.php');
    include_once('utilities.php');

    $description = $_POST['description'];
    $date_due = $_POST['date_due'];
    $userID = $_SESSION['userID'];

    if (strlen($description) != 0 && strlen($date_due) != 0) {
        try {
            $projID = createProject($description, $date_due);
            console_log($projID);
            addToProject($userID, $projID['max(projID)']);
        } catch (PDOException $Exception) {
            $_SESSION['error_message'] = "Failed to create a new project";
        }
    } else
        $_SESSION['error_message'] = "Failed to create a new item due to invalid or nonexistent inputs";

    header('Location: userProjects.php');
?>
