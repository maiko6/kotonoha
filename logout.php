<?php
require_once '../include/const.php';
require_once '../include/model.php';

session_start();
$session_name = session_name();
$_SESSION[] = '';

if (isset($_COOKIE[$session_name]) === TRUE) {
    $params = session_get_cookie_params();
    setcookie($session_name, '', time() - 42000,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
  );
}
 session_destroy();
 header('Location:./top.php');
 exit;