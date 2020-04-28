<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);
$main_text = trim($_POST['main_text']);
$small_text = trim($_POST['small_text']);
$created_at = trim($_POST['created_at']);
$created_at_fm = date("Y-m-d H:i:s", strtotime($created_at));
$link_url = trim($_POST['link_url']);
$img_url= trim($_POST['img_url']);


$inserthome_galleriesQuery = "insert into home_galleries 
                          (id, name,img_url, main_text,small_text,link_url,created_at)
                    values 
                          (null,'$name' ,'$img_url','$main_text','$small_text','$link_url','$created_at_fm')";
queryExecute($inserthome_galleriesQuery, false);
header("location: " . ADMIN_URL . "home_galleries");
die;