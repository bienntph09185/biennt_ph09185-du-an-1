<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
// lấy thông tin từ form gửi lên
$id = trim($_POST['id']);
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

// kiểm tra tài khoản có tồn tại hay không
$getwebsettingByIdQuery = "select * from web_setting where id = $id";
$websetting = queryExecute($getwebsettingByIdQuery, false);

if(!$websetting){
    header("location: " . ADMIN_URL . 'web_setting?msg=Web Setting không tồn tại');die;
}


// upload file
$filename = $websetting['logo'];
if($logo['size'] > 0){
    $filename = uniqid() . '-' . $logo['name'];
    move_uploaded_file($logo['tmp_name'], "../../public/images/" . $filename);
    $filename = "public/images/" . $filename;
}

$updatewebsettingQuery = "update web_setting 
                    set
                          name = '$name', 
                          address='$address',
                          fb_url='$fb_url',
                          youtube_url='$youtube_url',
                          twitter_url='$twitter_url',
                          introduce_content='$introduce_content',
                          ceo_introduce='$ceo_introduce',
                          blog_new_id='$blog_news_id',
                          map_url='$map_url',
                          email = '$email',  
                          logo = '$filename',
                          phone_number = '$phone_number'
                         where id = $id";
queryExecute($updatewebsettingQuery, false);
header("location: " . ADMIN_URL . "web_setting");
die;