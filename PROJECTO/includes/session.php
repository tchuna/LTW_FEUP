<?php

session_set_cookie_params(0);
ini_set('display_errors', 1);

$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
    session_regenerate_id(true);
}else
if($status == PHP_SESSION_DISABLED){
    //Sessions are not available
}else
if($status == PHP_SESSION_ACTIVE){
    //Destroy current and start new one
    session_destroy();
    session_start();
    session_regenerate_id(true);
}

$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));

$_SESSION['incorrectLogin_flag']=0;
$_SESSION['invalid_user'] = 0;
$_SESSION["profile_updated"] = 0;
$_SESSION['page'] = 'mainPage.php';

function setCurrentUser($username) {
  $_SESSION['username'] = $username;
}
function getErrorMessages() {
  if (isset($_SESSION['error_messages']))
    return $_SESSION['error_messages'];
  else
    return array();
}
function getSuccessMessages() {
  if (isset($_SESSION['success_messages']))
    return $_SESSION['success_messages'];
  else
    return array();
}
function clearMessages() {
  unset($_SESSION['error_messages']);
  unset($_SESSION['success_messages']);
}

?>
