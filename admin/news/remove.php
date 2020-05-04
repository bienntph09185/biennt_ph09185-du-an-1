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

$getRemovenewsQuery = "select * from news where id = $id";
$removenews = queryExecute($getRemovenewsQuery, false);
if(!$removenews){
    header("location: " . ADMIN_URL . "news?msg=Tin tức không tồn tại");
    die;
}
$removenewsQuery = "delete from news where id = $id";
queryExecute($removenewsQuery, false);
header("location: " . ADMIN_URL . "news?msg=Xóa tin tức thành công");
die;