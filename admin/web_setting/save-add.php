<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone_number = trim($_POST['phone_number']);
$address = trim($_POST['address']);
$fb_url = trim($_POST['fb_url']);
$youtube_url = trim($_POST['youtube_url']);
$introduce_content = trim($_POST['introduce_content']);
$ceo_introduce = trim($_POST['ceo_introduce']);
$map_url = trim($_POST['map_url']);
$twitter_url = trim($_POST['twitter_url']);
$blog_news_id = trim($_POST['blog_news_id']);
$logo = $_FILES['logo'];
// upload file ảnh
$filename = "";
if ($logo['size'] > 0) {
    $filename = uniqid() . '-' . $logo['name'];
    move_uploaded_file($logo['tmp_name'], "../../public/images/" . $filename);
    $filename = "public/images/" . $filename;
}
$insertWebsettingQuery = "insert into web_setting 
                          (id,status ,name, email, phone_number, address, map_url, fb_url,youtube_url,twitter_url,introduce_content,ceo_introduce,blog_new_id, logo)
                    values 
                          (null,null, '$name', '$email', '$phone_number', '$address', '$map_url','$fb_url' ,'$youtube_url','$twitter_url','$introduce_content','$ceo_introduce','$blog_news_id', '$filename')";
queryExecute($insertWebsettingQuery, false);
header("location: " . ADMIN_URL . "web_setting");
die;
var_dump($insertWebsettingQuery);
die;
