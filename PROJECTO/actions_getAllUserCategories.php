<?php
    include_once('database/list.php');

    $categories = getAllCategoriesOfUser($_POST['userID']);
    
    echo json_encode($categories);
?>
