<?php
require_once '../include/const.php';
require_once '../include/model.php';

session_start();

if (isset($_SESSION['user_id']) === TRUE) {
    header('Location:./home.php');
    exit;
}

if (isset($_SESSION['login_err_flag']) === TRUE) {
    $login_err_flag = $_SESSION['login_err_flag'];
    $_SESSION['login_err_flag'] = FALSE;
}else {
    $login_err_flag = FALSE;
}

if (isset($_COOKIE['user_name']) === TRUE) {
    $user_name = $_COOKIE['user_name'];
}else {
    $user_name = '';
}
$user_name = entity_str($user_name);


include_once '../kotonoha/view/top_view.php';
?>