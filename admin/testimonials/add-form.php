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
                        <h1 class="m-0 text-dark">Thêm Đánh giá</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->


                    <form id="add-testimonials-form" action="<?= ADMIN_URL . 'testimonials/save-add.php'?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tên<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Nội dung<span class="text-danger">*</span></label>
                                    <input type="text" name="content" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Chức Vụ<span class="text-danger">*</span></label>
                                    <input type="text" name="postion" class="form-control">
                                </div>
                                <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <img src="<?= DEFAULT_IMAGE ?>" id="preview-img" class="img-fluid">
                                </div>
                            </div>
                                <div class="form-group">
                                <label for="">Ảnh <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="avatar" onchange="encodeImageFileAsURL(this)">
                            </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                                    <a href="<?= ADMIN_URL . 'testimonials'?>" class="btn btn-danger">Hủy</a>
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
        if(file === undefined){
            $('#preview-img').attr('src', "<?= DEFAULT_IMAGE ?>");
            return false;
        }
        var reader = new FileReader();
        reader.onloadend = function() {
            $('#preview-img').attr('src', reader.result)
        }
        reader.readAsDataURL(file);
    }
    $('#add-testimonials-form').validate({
        rules:{
            name: {
                required: true,
                maxlength: 191
            },
            content: {
                required: true,
                minlength:10,
                maxlength: 191
            },
            postion: {
                required: true,
                minlength:10,
                maxlength: 191
            },
            avatar: {
                required: true,
                extension: "png|jpg|jpeg|gif"
            }
        },
        messages: {
            content: {
                required: "Hãy nhập nội dung",
                minlength: "Hãy nhập trên 10 kí tự",
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
            },
            postion: {
                required: "Hãy nhập chức vụ",
                minlength: "Hãy nhập trên 10 kí tự",
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
            },
            name: {
                required: "Hãy nhập tên ",
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
            },
            avatar: {
                required: "Hãy nhập ảnh đại diện",
                extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
            }
        }
    });
</script>
</body>
</html>