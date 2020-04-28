<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
// lấy thông tin từ form gửi lên
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$status= trim($_POST['status']);

// validate bằng php
$nameerr = "";
$statusrr="";

// check name
if(strlen($name) < 2 || strlen($name) > 191){
    $nameerr = "Yêu cầu nhập loại dịch vụ nằm trong khoảng 2-191 ký tự";
}

if($nameerr != "" ){
    header('location: ' . ADMIN_URL . "roomservice/edit-form.php?id=$id&nameerr=$nameerr");
    die;
}


$updateroomserviceTypeQuery = "update room_service 
                    set
                          name = '$name', 
                          status= '$status'
                    where id = $id";

queryExecute($updateroomserviceTypeQuery, false);
header("location: " . ADMIN_URL . "roomservice");
die;