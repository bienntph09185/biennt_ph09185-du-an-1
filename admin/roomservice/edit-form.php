<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getroomserviceEditQuery = "select * from room_service where id = '$id'";
$roomserviceEdit = queryExecute($getroomserviceEditQuery, false);

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
                        <h1 class="m-0 text-dark">Sửa loại dịch vụ</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->

                    <form id="edit-roomservice-type-form" action="<?= ADMIN_URL . 'roomservice/save-edit.php' ?>" method="post"
                          enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $roomserviceEdit['id'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Loại dịch vụ<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name"
                                           value="<?php echo $roomserviceEdit['name'] ?>">
                                    <!--                        --><?php //if(isset($_GET['nameerr'])):?>
                                    <!--                            <label class="error">--><? //= $_GET['nameerr']?><!--</label>-->
                                    <!--                        --><?php //endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Trạng thái</label>
                                
                                    <input type="number" class="form-control" name="status"
                                           value="<?php echo $roomserviceEdit['status'] ?>">
                                    
                                    <!--                        --><?php //if(isset($_GET['emailerr'])):?>
                                    <!--                            <label class="error">-->
                                    <? //= $_GET['emailerr']?><!--</label>-->
                                    <!--                        --><?php //endif; ?>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Sửa</button>&nbsp;
                                    <a href="<?= ADMIN_URL . 'roomservice' ?>" class="btn btn-danger">Hủy</a>
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
    $('#edit-roomservice-type-form').validate({
        rules: {
            name: {
                required: true,
                maxlength: 191
            },
        },
        messages: {
            name: {
                required: "Hãy nhập loại dịch vụ",
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
            },
        }
    });
</script>
</body>
</html>