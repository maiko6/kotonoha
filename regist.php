<?php
require_once '../include/const.php';
require_once '../include/model.php';

$error_name= [];
$error_passwd = [];
$msg = '';
$date = date("Y-m-d H:i:s");


$link = get_db_connect();
$request_method = get_request_method();
if ($request_method === 'POST') {
    $name = get_post_data('name');
    $password = get_post_data('password');
    $date = date("Y-m-d H:i:s");
    

    session_start();
    setcookie('user_name', $name, time() + 60 * 60 * 24 * 365);

    if (preg_match('/^(\s|　)+$/', $name) === 1) {
        $error_name[] = '※空白のみの入力はできません';
    }
    if (preg_match('/^[0-9a-zA-Z]{6,}+$/', $password) !== 1){
        $error_passwd[] = '※パスワードは6文字以上の半角英数字で入力して下さい';
    }
    if (empty($name) === TRUE) {
        $error_name[] = '※ユーザー名が未入力です';
    }


    $sql = "SELECT COUNT(*) AS num FROM user_info_table WHERE user_name = '".$name."'";
    $data = get_as_array($link, $sql);
    $data_count = $data[0]['num'];
    if ($data_count !== '0') {
        $error_name[] = '※ユーザー名が既に使用されています';
    }

    if (count($error_name) === 0 && count($error_passwd) === 0) {
        $sql = "INSERT INTO user_info_table(user_name, password, created_date, status) VALUES('".$name."', '".$password."', '".$date."', 2)";
        if (mysqli_query($link, $sql) === TRUE) {
            $msg = '↓↓登録が完了しました！ログインして下さい';
    } else {
       $msg = '登録失敗';
       header('Location:./regist.php');
        exit;
    }
    }
}

close_db_connect($link);






include_once '../kotonoha/view/regist_view.php';