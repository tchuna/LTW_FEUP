<?php
  include_once('includes/init.php');
  include_once('database/user.php');

  $username = htmlspecialchars($_POST["username"]);
  $password = htmlspecialchars($_POST["password"]);

  $userID = verifyUser($username, $password);
  if ($userID > -1) {
      $_SESSION['username'] = $username;
      $_SESSION['userID'] = $userID;
      $_SESSION['success_messages'][] = "Login Successful!";
      header('Location: userMainPage.php');
  } else {
      $_SESSION['error_messages'][] = "Login Failed!";
      header('Location: index.php');
  }
?>
