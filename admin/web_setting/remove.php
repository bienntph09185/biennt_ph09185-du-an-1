<?php
/**
 * Created by PhpStorm.
 * websetting: ginv2
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

$getRemovewebsettingQuery = "select * from web_setting where id = $id";
$removewebsetting = queryExecute($getRemovewebsettingQuery, false);
if(!$removewebsetting){
    header("location: " . ADMIN_URL . "web_setting?msg=WebSettings không tồn tại");
    die;
}

$removewebsettingQuery = "delete from web_setting where id = $id";
queryExecute($removewebsettingQuery, false);
header("location: " . ADMIN_URL . "web_setting?msg=Xóa thành công");
die;