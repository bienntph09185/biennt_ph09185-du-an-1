<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
// get data from room types
$getRoomTypesQuery = "select * from room_types";
$roomTypes = queryExecute($getRoomTypesQuery, true);
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
                            <h1 class="m-0 text-dark">Thêm Tin Tức</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->


                    <form id="add-room_galleries-form" action="<?= ADMIN_URL . 'room_galleries/save-add.php' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label >Loại phòng<span class="text-danger">*</span></label>
                                    <select class="form-control" name="room_id">
                                        <option value="">Chọn loại phòng</option>
                                        <?php foreach($roomTypes as $ro) :?>
                                            <option value="<?=$ro['id']?>"><?=$ro['name']?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Đường dẫn ảnh<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="img_url">
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                                    <a href="<?= ADMIN_URL . 'room_galleries' ?>" class="btn btn-danger">Hủy</a>
                                </div>
                            </div>
                    </form>

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
       
        $('#add-room_galleries-form').validate({
            rules: {
                title: {
                    required: true,
                    maxlength: 191,
                    minlength: 10
                },
                content: {
                    required: true,
                    maxlength: 191,
                    minlength: 10
                },
            },
            messages: {
                content: {
                    required: "Hãy nhập nội dung tin tức",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                    minlength: "Nội dung quá ngắn hãy nhập thêm"
                },
                title: {
                    required: "Hãy nhập tiêu đề tin tức",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                    minlength: "Tiêu quá ngắn hãy nhập thêm",
                    remote: "Tên đã tồn tại, vui lòng sử dụng tên khác"
                },
                feature_img: {
                    required: "Hãy nhập ảnh đại diện",
                    extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                }
            }
        });
    </script>
</body>

</html>