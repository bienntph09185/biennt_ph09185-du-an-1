<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

# Lấy ra tất cả bản ghi trong bảng users
$getAllMemberSql = "select * from users";
$users = queryExecute($getAllMemberSql, true);

# Lấy ra tất cả các bản ghi trong bảng booking
$getAllbookingsql = "select * from booking";
$booking = queryExecute($getAllbookingsql, true);

# Lấy ra tất cả các bản ghi trong bảng testimonials
$getAlltestimonialssql = "select * from testimonials";
$testimonials = queryExecute($getAlltestimonialssql, true);

# Lấy ra tất cả các bản ghi trong bảng 	news
$getAllnewssql = "select * from 	news";
$news = queryExecute($getAllnewssql, true);

# Lấy ra tất cả các bản ghi trong bảng 	room_service
$getAllroomservicesql = "select * from  room_service";
$roomservice = queryExecute($getAllroomservicesql, true);

# Lấy ra tất cả các bản ghi trong bảng 	room_types
$getAllroomtypessql = "select * from 	room_types";
$roomtypes = queryExecute($getAllroomtypessql, true);

# Lấy ra tất cả các bản ghi trong bảng 	contact
$getAllcontactsql = "select * from 	contact";
$contact = queryExecute($getAllcontactsql, true);

$getAllwebsettingsql = "select * from 	web_setting";
$websetting = queryExecute($getAllwebsettingsql, true);

$getAllhome_galleriessql = "select * from 	home_galleries";
$home_galleries = queryExecute($getAllhome_galleriessql, true);

$getAllroom_galleriessql = "select * from 	room_galleries";
$room_galleries = queryExecute($getAllroom_galleriessql, true);

$getAllbookingsql = "select * from 	booking";
$booking = queryExecute($getAllbookingsql, true);

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
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?= count($users) ?></h3>
    
                                <p>Người dùng</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="<?= ADMIN_URL . 'users'?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?= count($roomservice)?></h3>

                                <p>Dịch vụ Phòng</p>
                            </div>
                            <div class="icon">
                            <i class="fas fa-concierge-bell"></i>
                            </div>
                            <a href="<?= ADMIN_URL . 'roomservice'?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?= count($home_galleries)?></h3>

                                <p>Home Galleries</p>
                            </div>
                            <div class="icon">
                            <i class="fas fa-images"></i>
                            </div>
                            <a href="<?= ADMIN_URL . 'home_galleries'?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?= count($booking)?></h3>

                                <p>Booking</p>
                            </div>
                            <div class="icon">
                            <i class="fas fa-images"></i>
                            </div>
                            <a href="<?= ADMIN_URL . 'booking'?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?= count($room_galleries)?></h3>

                                <p>Room Galleries</p>
                            </div>
                            <div class="icon">
                            <i class="fas fa-images"></i>
                            </div>
                            <a href="<?= ADMIN_URL . 'room_galleries'?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?= count($roomtypes)?></h3>

                                <p>Loại Phòng</p>
                            </div>
                            <div class="icon">
                            <i class="fas fa-home"></i>
                            </div>
                            <a href="<?= ADMIN_URL . 'roomtypes'?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?= count($contact)?></h3>

                                <p>Contact</p>
                            </div>
                            <div class="icon">
                            <i class="fas fa-id-card"></i>
                            </div>
                            <a href="<?= ADMIN_URL . 'contact'?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?= count($news)?></h3>

                                <p>Tin Tức</p>
                            </div>
                            <div class="icon">
                            <i class="far fa-newspaper"></i>
                            </div>
                            <a href="<?= ADMIN_URL . 'news'?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?= count($websetting)?></h3>

                                <p>Web Setting</p>
                            </div>
                            <div class="icon">
                            <i class="fas fa-cogs"></i>
                            </div>
                            <a href="<?= ADMIN_URL . 'web_setting'?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?= count($testimonials) ?></h3>
    
                                <p>Đánh Giá</p>
                            </div>
                            <div class="icon">
                            <i class="fas fa-comments"></i>
                            </div>
                            <a href="<?= ADMIN_URL . 'testimonials'?>" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
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

</body>
</html>

