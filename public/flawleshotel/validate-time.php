<?php 
session_start();
require_once "utils.php";
$checkin = isset($_GET['checkin']) ? $_GET['checkin'] : "";
$checkout = isset($_GET['checkout']) ? $_GET['checkout'] : "";
$children = isset($_GET['children']) ? $_GET['children'] : "";
$adult = isset($_GET['adult']) ? $_GET['adult'] : "";
$diff = strtotime($checkout)-strtotime($checkin);
$total_date = round($diff/(60*60*24));
$today = date("m/d/Y");
$diff_today = strtotime($checkin)-strtotime($today);
$total_today = round($diff_today/(60*60*24));



$checkinerr = "";
$checkouterr = "";


if(strlen($checkin)==0){
    $checkinerr="Yêu cầu nhập ngày đến khách sạn";
}
if($checkinerr==""&&$total_date<=0){
    $checkinerr = "Yêu cầu nhập ngày đến nhỏ hơn ngày rời";
}
if($checkinerr==""&&$total_today<0){
    $checkinerr = "Yêu cầu nhập ngày đến lớn hơn hoặc bằng hiện tại";
}
if(strlen($checkout)==0){
    $checkouterr="Yêu cầu nhập ngày rời đi";
}
if($checkinerr.$checkouterr!=""){
    header("location: http://localhost/du-an-1/index.php?checkinerr=$checkinerr&&checkouterr=$checkouterr");
    die;
}
else{
    header("location: check-available.php?checkin=$checkin&&checkout=$checkout&&children=$children&&adult=$adult");
    die;
}
?>
