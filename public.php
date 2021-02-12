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
    $name = $_COOKIE['name'];
} else {
    header('Location:./top.php');
    exit;
}

$link = get_db_connect();
$sql = "SELECT index_table.user_name, words, index_table.created_date, comment_id FROM index_table 
        JOIN user_info_table ON index_table.user_id = user_info_table.user_id WHERE status = 1 ORDER BY comment_id DESC";
$data = get_as_array($link, $sql);
$data = entity_assoc_array($data);

$request_method = get_request_method();
if ($request_method === 'POST') {
    $comment_id = get_post_data('comment_id');
    $words = get_post_data('words');
    $date = date("Y-m-d H:i:s");

    $sql = "INSERT INTO favorite_table (user_id, comment_id, words, created_date) VALUES('".$user_id."', '".$comment_id."', '".$words."', '".$date."')";
    mysqli_query($link, $sql);
}

close_db_connect($link);

include_once '../kotonoha/view/public_view.php';
