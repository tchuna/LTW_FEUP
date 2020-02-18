<?php
    include_once('database/user.php');

    $users = getAllUsernames();

    echo json_encode($users);
?>
