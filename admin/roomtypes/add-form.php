<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$getRoleQuery = "select * from roles where status = 1";
$roles = queryExecute($getRoleQuery, true);
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
                            <h1 class="m-0 text-dark">Thêm Loại Phòng</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->


                    <form id="add-roomtypes-form" action="<?= ADMIN_URL . 'roomtypes/save-add.php' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tên Loại Phòng<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Giá<span class="text-danger">*</span></label>
                                    <input type="text" name="price" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Giới Thiệu<span class="text-danger">*</span></label>
                                    <input type="text" name="about" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Số người lớn<span class="text-danger">*</span></label>
                                    <input type="text" name="adult" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Số trẻ nhỏ<span class="text-danger">*</span></label>
                                    <input type="text" name="children" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Giới thiệu nhanh<span class="text-danger">*</span></label>
                                    <input type="text" name="short_desc" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Trạng thái<span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option value="<?= ACTIVE ?>">Đang Hoạt Động</option>
                                        <option value="<?= INACTIVE ?>">Tạm Nghỉ</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        <img src="<?= DEFAULT_IMAGE ?>" id="preview-img" class="img-fluid">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Ảnh phòng<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="feature_img" onchange="encodeImageFileAsURL(this)">
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                                    <a href="<?= ADMIN_URL . 'roomtypes' ?>" class="btn btn-danger">Hủy</a>
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
        function encodeImageFileAsURL(element) {
            var file = element.files[0];
            if (file === undefined) {
                $('#preview-img').attr('src', "<?= DEFAULT_IMAGE ?>");
                return false;
            }
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#preview-img').attr('src', reader.result)
            }
            reader.readAsDataURL(file);
        }
        $('#add-roomtypes-form').validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 191,
                    remote: {
                        url: "<?= ADMIN_URL . 'roomtypes/verify-name-type-existed.php' ?>",
                        type: "post",
                    }
                },
                price: {
                    required: true,
                    number: true,
                    min :100,
                    max: 2500
                },
                adult: {
                    required: true,
                    number: true,
                    min:1,
                    max:5
                },
                children: {
                    required: true,
                    number: true,
                    min:1,
                    max:5
                },
                about: {
                    required: true,
                    minlength: 10 ,
                    maxlength: 191
                },
                short_desc: {
                    required: true,
                    minlength: 10 ,
                    maxlength: 30
                },
                feature_img: {
                    required: true,
                    extension: "png|jpg|jpeg|gif"
                }
                
            },
            messages: {
                price: {
                    required: "Hãy nhập giá phòng",
                    max: "Giá trong khoảng 100 đến 2500",
                    min:"Giá trong khoảng 100 đến 2500",
                    number: "Hãy nhập số"
                },
                adult: {
                    required: "Hãy nhập số lượng người lớn",
                    min: "Nhập số từ 1 > 5",
                    max:"Nhập số từ 1 > 5",
                    number: "Hãy nhập số"
                },
                children: {
                    required: "Hãy nhập số lượng trẻ nhỏ",
                    min: "Nhập số từ 1 > 5",
                    max:"Nhập số từ 1 > 5",
                    number: "Hãy nhập số"
                },
                about: {
                    required: "Hãy nhập giới thiệu",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                   minlength: "Hãy nhập trên 10 kí tự"
                },
                short_desc: {
                    required: "Hãy nhập giới thiệu nhanh",
                    maxlength: "Số lượng ký tự trong khoảng từ 10 đến 30",
                   minlength: "Số lượng ký tự trong khoảng từ 10 đến 30"
                },
                name: {
                    required: "Hãy nhập tên loại phòng",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
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