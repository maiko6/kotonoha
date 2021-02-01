<?php
require_once '../include/const.php';
require_once '../include/model.php';
session_start();

$request_method = get_request_method();/*フォームの内容を取得*/
$name = get_post_data('name');
$password = get_post_data('password');

setcookie ('name', $name, time() + 60 * 60 * 24 * 365);/*ユーザーネームをクッキーに保存*/

$link = get_db_connect();
$sql = "SELECT user_id FROM user_info_table WHERE user_name = '".$name."' AND password = '".$password."'";
$data = get_as_array($link, $sql);

close_db_connect($link);

if (isset($data[0]['user_id']) === TRUE) {
    $_SESSION['user_id'] = $data[0]['user_id'];
    header('Location:./home.php');
    exit;
} else {
    $_SESSION['login_err_flag'] = TRUE;
    header('Location:./top.php');
    exit;

}


?>