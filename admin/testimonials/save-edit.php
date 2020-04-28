<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
// lấy thông tin từ form gửi lên
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$content = trim($_POST['content']);
$postion = trim($_POST['postion']);
$avatar = $_FILES['avatar'];

//
$gettestimonialsByIdQuery = "select * from testimonials where id = $id";
$testimonials = queryExecute($gettestimonialsByIdQuery, false);

// validate bằng php
$nameerr = "";

// check name
if(strlen($name) < 2 || strlen($name) > 191){
    $nameerr = "Yêu cầu nhập loại dịch vụ nằm trong khoảng 2-191 ký tự";
}

if($nameerr != "" ){
    header('location: ' . ADMIN_URL . "testimonials/edit-form.php?id=$id&nameerr=$nameerr");
    die;
}
$filename = $testimonials['avatar'];
if($avatar['size'] > 0){
    $filename = uniqid() . '-' . $avatar['name'];
    move_uploaded_file($avatar['tmp_name'], "../../public/images/" . $filename);
    $filename = "public/images/" . $filename;
}


$updatetestimonialsTypeQuery = "update testimonials 
                    set
                            name ='$name',
                            content = '$content', 
                            postion   = '$postion',                         
                          avatar='$filename'                
                    where id = $id";
queryExecute($updatetestimonialsTypeQuery, false);
header("location: " . ADMIN_URL . "testimonials");
die;