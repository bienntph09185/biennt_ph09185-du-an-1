<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = trim($_POST['id']);
$room_id = trim($_POST['room_id']);
$img_url = trim($_POST['img_url']);

// kiểm tra sự tồn tại
$getRoomGalleriesQuery = "select * from room_galleries where id = $id";
$roomGalleries = queryExecute($getRoomGalleriesQuery, false);

if (!$roomGalleries) {
    header("location: " . ADMIN_URL . 'room_galleries?msg=Ảnh phòng không tồn tại');
    die;
}
// insert services query
$updateRoomGalleriesQuery = "update room_galleries set
                          room_id = '$room_id',
                          img_url = '$img_url'
                        where id = '$id'";
queryExecute($updateRoomGalleriesQuery, false);
header("location: " . ADMIN_URL . "room_galleries");
die;