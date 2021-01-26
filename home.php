<?php
require_once '../include/const.php';
require_once '../include/model.php';
/*ログイン済みかどうかを確認 */
session_start();
if (isset($_SESSION['user_id']) === TRUE) {
    $user_id = $_SESSION['user_id'];
} else {
    header('Location:./top.php');
    exit;
}
if (isset($_COOKIE['name']) === TRUE) {
    $name = $_COOKIE['name'];
} else {
    header('Location:./top.php');
}
$msg = [];
$error = [];
$link = get_db_connect();
$request_method = get_request_method();
if ($request_method === 'POST') {
    $words = get_post_data('words');
    $date = date('Y-m-d');
    $task = get_post_data('task');
    $comment_id = get_post_data('id');
   
    if ($task === 'insert') {
        if (empty($words) === TRUE) {
            $error[] = '※入力して下さい';
        }
        if (count($error === 0)) {
            $sql = "INSERT INTO index_table (user_id, user_name, words, created_date) VALUES('".$user_id."', '".$name."', '".$words."', '".$date."')";
            if (mysqli_query($link, $sql) !== FALSE) {
                $msg[] = '記録しました';
            } else {
                $msg[] = '記録に失敗しました';
        }
        }
    }   

    if ($task === 'delete') {
        $sql = "DELETE FROM index_table WHERE comment_id = '".$comment_id."'";
        if (mysqli_query($link, $sql) !== FALSE) {
            $meg[] = '削除しました';
        } else {
            $meg[] = '削除に失敗しました';
        }
    }
}

$sql = "SELECT comment_id, words, created_date FROM index_table  WHERE user_id = '".$user_id."' ORDER BY comment_id DESC";
$data = get_as_array($link, $sql);
$data = entity_assoc_array($data);
close_db_connect($link);




include_once '../kotonoha/view/home_view.php';
