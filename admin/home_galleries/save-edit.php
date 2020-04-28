<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
// lấy thông tin từ form gửi lên
$id = trim($_POST['id']);
$main_text = trim($_POST['main_text']);
$name = trim($_POST['name']);
$created_at = trim($_POST['created_at']);
$created_at_fm = date("Y-m-d H:i:s", strtotime($created_at));
$img_url = trim($_POST['img_url']);
$link_url = trim($_POST['link_url']);
$small_text = trim($_POST['small_text']);
//
$gethome_galleriesByIdQuery = "select * from home_galleries where id = $id";
$home_galleries = queryExecute($gethome_galleriesByIdQuery, false);


$updatehome_galleriesTypeQuery = "update home_galleries 
                    set
                           name = '$name',
                            main_text = '$main_text',
                            small_text = '$small_text',
                            link_url = '$link_url',
                            img_url = '$img_url',
                            created_at= '$created_at_fm'
                    where id = $id";

queryExecute($updatehome_galleriesTypeQuery, false);
header("location: " . ADMIN_URL . "home_galleries");
die;
