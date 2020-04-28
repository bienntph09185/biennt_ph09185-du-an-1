<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
// lấy thông tin từ form gửi lên
$id = trim($_POST['id']);
$content = trim($_POST['content']);
$title = trim($_POST['title']);
$created_at = trim($_POST['created_at']);
$created_at_fm = date("Y-m-d H:i:s", strtotime($created_at));
$feature_img = $_FILES['feature_img'];

//
$getnewsByIdQuery = "select * from news where id = $id";
$news = queryExecute($getnewsByIdQuery, false);

$filename = $news['feature_img'];
if ($feature_img['size'] > 0) {
    $filename = uniqid() . '-' . $feature_img['name'];
    move_uploaded_file($feature_img['tmp_name'], "../../public/images/" . $filename);
    $filename = "public/images/" . $filename;
}


$updatenewsTypeQuery = "update news 
                    set
                           title = '$title',
                            content = '$content',
                            created_at='$created_at_fm',
                          feature_img='$filename'                    
                    where id = $id";

queryExecute($updatenewsTypeQuery, false);
header("location: " . ADMIN_URL . "news");
die;
