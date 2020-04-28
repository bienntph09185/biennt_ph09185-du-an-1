<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

// lấy danh sách booking
if(isset($_GET['checked'])){
    $getBooking = "select b.*, r.name roomname 
                        from booking b
                        join room_types r
                        on r.id = b.room_type_id
                        where b.checkin_in = 0
                        ORDER BY b.id DESC";
}elseif(isset($_GET['unchecked'])){
    $getBooking = "select b.*, r.name roomname 
                        from booking b
                        join room_types r
                        on r.id = b.room_type_id
                        where b.checkin_in = 2
                        ORDER BY b.id DESC";
}else{
    $getBooking = "select b.*, r.name roomname 
                        from booking b
                        join room_types r
                        on r.id = b.room_type_id
                        where b.checkin_in = 1
                        ORDER BY b.id DESC";
}
$bookings = queryExecute($getBooking, true);

?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once '../_share/style.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include_once '../_share/header.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include_once '../_share/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Quản trị booking</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= ADMIN_URL . 'dashboard' ?>">Dashboard</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Địa chỉ</th>
                                            <th>Email</th>
                                            <th>Loại phòng</th>
                                            <th>Lời nhắn</th>
                                            <th>
                                                <a href="<?= ADMIN_URL . 'booking' ?>" class="btn btn-outline-primary  btn-sm"></i>Chờ xác nhận</a>
                                                <a href="<?= ADMIN_URL . 'booking?unchecked' ?>" class="btn btn-outline-secondary  btn-sm"></i>Không xác nhận</a>
                                                <a href="<?= ADMIN_URL . 'booking?checked' ?>" class="btn btn-outline-dark btn-sm"></i> Đã xác nhận</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bookings as $book) : ?>
                                            <tr>
                                                <td><?= $book['customer_name'] ?></td>
                                                <td><?= $book['address'] ?></td>
                                                <td><?= $book['email'] ?></td>
                                                <td><?= $book['roomname'] ?></td>
                                                <td><?= $book['message'] ?></td>
                                                <td>
                                                    <a href="<?= ADMIN_URL . 'booking/checking-form.php?id=' . $book['id'] ?>" class="btn btn-sm btn-info"><i class="far fa-calendar-check"></i></a>
                                                    <a href="<?= ADMIN_URL . 'booking/remove.php?id=' . $book['id'] ?>" class="btn-remove btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include_once '../_share/footer.php'; ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include_once '../_share/script.php'; ?>
    <script>
        $(document).ready(function() {
            $('.btn-remove').on('click', function() {
                var redirectUrl = $(this).attr('href');
                Swal.fire({
                    title: 'Thông báo!',
                    text: "Bạn có chắc chắn muốn xóa tài khoản này?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý'
                }).then((result) => { // arrow function es6 (es2015)
                    if (result.value) {
                        window.location.href = redirectUrl;
                    }
                });
                return false;
            });
            <?php if (isset($_GET['msg'])) : ?>
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'warning',
                    title: "<?= $_GET['msg']; ?>",
                    showConfirmButton: false,
                    timer: 1500
                });
            <?php endif; ?>
        });
    </script>
</body>

</html>