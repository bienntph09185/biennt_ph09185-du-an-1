
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
$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getupdateordersQuery = "select * from orders where id = $id";
$updateorders = queryExecute($getupdateordersQuery, false);
$status="đã xác nhận";
//if($updateUser['role_id'] >= $_SESSION[AUTH]['role_id']){
//    header("location: " . ADMIN_URL . "users?msg=Không đủ quyền hạn thực hiện hành động này");
//    die;
//}

$updateordersQuery = "update orders set status='Đã xác nhận' where id = $id";
queryExecute($updateordersQuery, false);
header("location: " . ADMIN_URL . "orders?msg=Xác nhận dịch vụ thành công");
die;
?>

