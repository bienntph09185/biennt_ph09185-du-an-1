<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$content = trim($_POST['content']);
$created_at = trim($_POST['created_at']);
$title = trim($_POST['title']);
$created_at_fm = date("Y-m-d H:i:s", strtotime($created_at));
$feature_img = $_FILES['feature_img'];
$author_id= trim($_POST['author_id']);

// upload file ảnh
$filename = "";
if($feature_img['size'] > 0){
    $filename = uniqid() . '-' . $feature_img['name'];
    move_uploaded_file($feature_img['tmp_name'], "../../public/images/" . $filename);
    $filename = "public/images/" . $filename;
}

$insertnewsQuery = "insert into news 
                          (id, title,feature_img, content,author_id,created_at)
                    values 
                          (null,'$title' ,'$filename','$content','$author_id','$created_at_fm')";
queryExecute($insertnewsQuery, false);
header("location: " . ADMIN_URL . "news");
die;