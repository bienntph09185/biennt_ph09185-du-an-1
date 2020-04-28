<?php
session_start();
require_once 'utils.php';

$id = isset($_POST['id']) ? $_POST['id'] : "";
$getRoomQuery = "select * from room_types where id = '$id'";
$room = queryExecute($getRoomQuery, false);

$checkin = trim($_POST['checkin']);
$checkout = trim($_POST['checkout']);
$checkin_date = date("Y-m-d", strtotime($checkin));
$checkout_date = date("Y-m-d", strtotime($checkout));
$adults = $room['adult'];
$children = $room['children'];
$customer_name = trim($_POST['customer_name']);
$email = trim($_POST['email']);
$address = trim($_POST['address']);
$message = trim($_POST['message']);
$room_type = $room['id'];
$check_in= trim($_POST['check_in']);
/*
$nameerr ="";
$emailerr ="";

if(strlen($customer_name)<2 || strlen($customer_name)>191){
    $nameerr = "Yêu cầu nhập tên từ 2->191 ký tự";
}
if(strlen($email)==0){
    $emailerr = "Yêu cầu nhập email";
}
if($emailerr=="" && !filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailerr = "Yêu cầu nhập đúng định dạng email";
}
if($nameerr. $emailerr!=""){
    header('location: '.BASE_URL."booking.php?nameerr=$nameerr&&emailerr=$emailerr");
    die;
}*/
$insertBookQuery = "insert into booking
                                    (customer_name,email,address,checkin_date,checkout_date,adult_number,children_number,room_type_id,message,checkin_in)
                                values
                                    ('$customer_name','$email','$address','$checkin_date','$checkout_date','$adults','$children','$room_type','$message','$check_in')";
queryExecute($insertBookQuery, false);
header('location: '.BASE_URL."index.php?msg=Đặt phòng thành công");
die;
?>