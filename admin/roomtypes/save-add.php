<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);
$price = trim($_POST['price']);
$about = trim($_POST['about']);
$adult = trim($_POST['adult']);
$children = trim($_POST['children']);
$short_desc = trim($_POST['short_desc']);
$status = trim($_POST['status']);
$feature_img = $_FILES['feature_img'];

// upload file ảnh
$filename = "";
if($feature_img['size'] > 0){
    $filename = uniqid() . '-' . $feature_img['name'];
    move_uploaded_file($feature_img['tmp_name'], "../../public/images/" . $filename);
    $filename = "public/images/" . $filename;
}

//
$insertroomtypesQuery = "insert into room_types 
                          (id, name, price, about, adult, children, status,	feature_img,short_desc)
                    values 
                          (null, '$name', '$price', '$about', '$adult', '$children', '$status','$filename','$short_desc')";
queryExecute($insertroomtypesQuery, false);
header("location: " . ADMIN_URL . "roomtypes");
die;