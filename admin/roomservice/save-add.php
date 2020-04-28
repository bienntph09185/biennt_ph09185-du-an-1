<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);
$status = trim($_POST['status']);

$insertTypeQuery = "insert into room_service values(null,'$name','$status')";
queryExecute($insertTypeQuery, false);
header("location: " . ADMIN_URL . "roomservice");
die;