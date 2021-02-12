<?php
require_once '../include/const.php';
require_once '../include/model.php';

session_start();

if (isset($_SESSION['user_id']) === TRUE) {
    $user_id = $_SESSION['user_id'];
} else {
    header('Location:./top.php');
    exit;
}

if (isset($_COOKIE['name']) === TRUE) {
    $nameb= $_COOKIE['name'];
} else {
    header('Location:./top.php');
    exit;
}

$link = get_db_connect();
$request_method = get_request_method();
if ($request_method === 'POST') {
    $comment_id = get_post_data('comment_id');
    $sql = "DELETE FROM favorite_table WHERE comment_id = '".$comment_id."' AND user_id = '".$user_id."'";
    if (mysqli_query($link, $sql) !== FALSE) {
        print '削除しました';
    } else {
        print '失敗しました';
    }
}

$sql = "SELECT words, created_date, comment_id FROM favorite_table WHERE user_id = '".$user_id."' ORDER BY created_date DESC";
$data = get_as_array($link, $sql);
$data = entity_assoc_array($data);
close_db_connect($link);

include_once '../kotonoha/view/favorite_view.php';