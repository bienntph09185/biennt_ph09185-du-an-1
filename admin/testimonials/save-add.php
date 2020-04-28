<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);
$content = trim($_POST['content']);
$postion = trim($_POST['postion']);
$avatar = $_FILES['avatar'];
// validate bằng php
$nameerr = "";
$postionrr="";
// check name
if(strlen($name) < 2 || strlen($name) > 191){
    $nameerr = "Yêu cầu nhập tên loại phòng nằm trong khoảng 2-191 ký tự";
}

// check email

// check phòng đã tồn tại hay chưa

// check password
// mã hóa mật khẩu

// upload file ảnh
$filename = "";
if($avatar['size'] > 0){
    $filename = uniqid() . '-' . $avatar['name'];
    move_uploaded_file($avatar['tmp_name'], "../../public/images/" . $filename);
    $filename = "public/images/" . $filename;
}

//
$inserttestimonialsQuery = "insert into testimonials 
                          (id, name, content,avatar, postion)
                    values 
                          (null, '$name', '$content','$filename', '$postion')";
queryExecute($inserttestimonialsQuery, false);
header("location: " . ADMIN_URL . "testimonials");
die;