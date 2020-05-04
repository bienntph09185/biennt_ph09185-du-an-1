<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 2/17/20
 * Time: 18:41
 * 1. lấy id xuống
 * 2. kiểm tra xem có quyền để xóa tài khoản với id đc nhận hay không
 * 4. thực hiện câu lệnh xóa với csdl
 * 5. điều hướng về danh sách
 *
 */
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getRemoveroom_galleriesQuery = "select * from room_galleries where id = $id";
$removeroom_galleries = queryExecute($getRemoveroom_galleriesQuery, false);
if(!$removeroom_galleries){
    header("location: " . ADMIN_URL . "room_galleries?msg=Room Galleries không tồn tại");
    die;
}
$removeroom_galleriesQuery = "delete from room_galleries where id = $id";
queryExecute($removeroom_galleriesQuery, false);
header("location: " . ADMIN_URL . "room_galleries?msg=Xóa thành công");
die;