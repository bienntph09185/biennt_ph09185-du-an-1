
<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$room_id = trim($_POST['room_id']);
$img_url = trim($_POST['img_url']);
$insertRoomGalleriesQuery = "insert into room_galleries
                          (room_id, img_url)
                    values
                          ('$room_id', '$img_url')";
queryExecute($insertRoomGalleriesQuery, false);
header("location: " . ADMIN_URL . "room_galleries");
die;