<?php

   include_once('includes/init.php');
   include_once('database/user.php');

   function getSessionUser(){
     $user = $_SESSION['username'];
     return getUserByUsername($user);
   }

   function calculateAge($birthdate){
     date_default_timezone_set('Europe/Lisbon');
     $date = new DateTime($birthdate);
     $now = new DateTime();
     $interval = $now->diff($date);
     return $interval->y;
   }

?>
