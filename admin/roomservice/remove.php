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

$getRemoveroomserviceQuery = "select * from roomservice where id = $id";
$removeroomservice = queryExecute($getRemoveroomserviceQuery, false);
if(!$removeroomservice){
    header("location: " . ADMIN_URL . "roomservice?msg=Loại dịch vụ  không tồn tại");
    die;
}
$removeroomserviceQuery = "delete from roomservice where id = $id";
queryExecute($removeroomserviceQuery, false);
header("location: " . ADMIN_URL . "roomservice?msg=Xóa thành công");
die;