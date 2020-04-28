<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
// lấy thông tin từ form gửi lên
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$price = trim($_POST['price']);
$about = trim($_POST['about']);
$adult = trim($_POST['adult']);
$children = trim($_POST['children']);
$short_desc = trim($_POST['short_desc']);
$status = trim($_POST['status']);
$feature_img = $_FILES['feature_img'];

//
$getroomtypesByIdQuery = "select * from room_types where id = $id";
$roomtypes = queryExecute($getroomtypesByIdQuery, false);

// validate bằng php
$nameerr = "";

// check name
if(strlen($name) < 2 || strlen($name) > 191){
    $nameerr = "Yêu cầu nhập loại dịch vụ nằm trong khoảng 2-191 ký tự";
}

if($nameerr != "" ){
    header('location: ' . ADMIN_URL . "roomtypes/edit-form.php?id=$id&nameerr=$nameerr");
    die;
}
$filename = $roomtypes['feature_img'];
if($feature_img['size'] > 0){
    $filename = uniqid() . '-' . $feature_img['name'];
    move_uploaded_file($feature_img['tmp_name'], "../../public/images/" . $filename);
    $filename = "public/images/" . $filename;
}


$updateroomtypesTypeQuery = "update room_types 
                    set
                            name ='$name',
                            price = '$price', 
                            about   = '$about',                         
                          adult = '$adult',
                          children= '$children',
                          status='$status',
                          short_desc= '$short_desc',
                          feature_img='$filename'                    
                    where id = $id";

queryExecute($updateroomtypesTypeQuery, false);
header("location: " . ADMIN_URL . "roomtypes");
die;