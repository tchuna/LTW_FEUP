<?php

    try{
      $dbh = new PDO('sqlite:database/database.db');
      $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
      error_log($e->getMessage(), 0);
      print "Unable to open database file! \n".$e->getMessage();
    }

?>
