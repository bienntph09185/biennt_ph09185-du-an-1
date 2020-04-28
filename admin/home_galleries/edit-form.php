<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$gethome_galleriesEditQuery = "select * from home_galleries where id = '$id'";
$home_galleriesEdit = queryExecute($gethome_galleriesEditQuery, false);

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

                    <form id="edit-home_galleries-type-form" action="<?= ADMIN_URL . 'home_galleries/save-edit.php' ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $home_galleriesEdit['id'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tên<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $home_galleriesEdit['name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Nội dung chính<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="main_text" value="<?php echo $home_galleriesEdit['main_text'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Nội dung phụ<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="small_text" value="<?php echo $home_galleriesEdit['small_text']?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Đường dẫn link<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="link_url" value="<?php echo $home_galleriesEdit['link_url']?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Đường dẫn ảnh<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="img_url" value="<?php echo $home_galleriesEdit['img_url']?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Thời gian<span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                            <input type="" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="created_at" value="<?php echo $home_galleriesEdit['created_at']?>" />
                                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fas fa-calendar-check"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        $(function() {
                                            $('#datetimepicker1').datetimepicker();
                                        });
                                    </script>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Sửa</button>&nbsp;
                                    <a href="<?= ADMIN_URL . 'home_galleries' ?>" class="btn btn-danger">Hủy</a>
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
                $('#preview-img').attr('src', "<?= BASE_URL . $home_galleriesEdit['feature_img'] ?>");
                return false;
            }
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#preview-img').attr('src', reader.result)
            }
            reader.readAsDataURL(file);
        }
        $('#edit-home_galleries-form').validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 191
                },
                feature_img: {
                    extension: "png|jpg|jpeg|gif"
                }
            },
            messages: {
                name: {
                    required: "Hãy nhập tên người dùng",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                },
                email: {
                    required: "Hãy nhập email",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                    email: "Không đúng định dạng email",
                    remote: "Email đã tồn tại, vui lòng sử dụng email khác"
                },

                feature_img: {
                    extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                }
            }
        });
    </script>
</body>

</html>