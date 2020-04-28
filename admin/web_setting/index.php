<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : "";
$roleId = isset($_GET['role']) == true ? $_GET['role'] : false;


// danh sách web-setting
$getDataWebsettingsQuery = "select * from web_setting";
$webSettings = queryExecute($getDataWebsettingsQuery, true);

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
                            <h1 class="m-0 text-dark">Quản trị web_setting</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= ADMIN_URL ?>">Dashboard</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-10 col-offset-1">
                            <!-- Filter  -->
                        </div>
                        <!-- Danh sách web_setting  -->
                        <table class="table table-stripped">
                            <thead>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Trạng Thái</th>
                                <th width='100'>Logo</th>
                                <th>Email</th>
                                <th>Số Điện Thoại</th>
                                <th>Địa Chỉ</th>
                                <th>Đường dẫn Map</th>
                                <th>Đường dẫn Facebook</th>
                                <th>Đường Dẫn Youtube</th>
                                <th>Đường dẫn Twitter</th>
                                <th>Lời Giới Thiệu</th>
                                <th>Giới Thiệu về CEO</th>
                                <th>
                                    <a href="<?php echo ADMIN_URL . 'web_setting/add-form.php' ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm</a>
                                </th>
                            </thead>
                            <tbody>
                                <?php foreach ($webSettings as $us) : ?>
                                    <tr>
                                        <td><?php echo $us['id'] ?></td>
                                        <td><?php echo $us['name'] ?></td>
                                        <td> <?php if ($us['status'] == 1) : ?>
                                                <option value="<?php echo $us['status'] ?>">Đang Được Kích Hoạt</option>
                                            <?php endif; ?>
                                            <?php if ($us['status'] == -1) : ?>
                                                <option value="<?php echo $us['status'] ?>">Chưa Kích hoạt</option>
                                            <?php endif; ?></td>
                                        <td>
                                            <img class="img-fluid" src="<?= BASE_URL . $us['logo'] ?>" alt="">
                                        </td>
                                        <td><?php echo $us['email'] ?></td>
                                        <td><?php echo $us['phone_number'] ?></td>
                                        <td>
                                            <?php echo $us['address'] ?>
                                        </td>

                                        <td><?php echo $us['map_url'] ?></td>
                                        <td><?php echo $us['fb_url'] ?></td>
                                        <td><?php echo $us['youtube_url'] ?></td>
                                        <td><?php echo $us['twitter_url'] ?></td>
                                        <td><?php echo $us['introduce_content'] ?></td>
                                        <td><?php echo $us['ceo_introduce'] ?></td>
                                        <td>
                                           
                                                <a href="<?php echo ADMIN_URL . 'web_setting/edit-form.php?id=' . $us['id'] ?>" class="btn btn-sm btn-info">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                           
                                            
                                                <a href="<?php echo ADMIN_URL . 'web_setting/remove.php?id=' . $us['id'] ?>" class="btn-remove btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.row -->

                </div><!-- /.container-fluid -->
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