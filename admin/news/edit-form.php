<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getnewsEditQuery = "select * from news where id = '$id'";
$newsEdit = queryExecute($getnewsEditQuery, false);

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

                    <form id="edit-news-type-form" action="<?= ADMIN_URL . 'news/save-edit.php' ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $newsEdit['id'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tiêu đề<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" value="<?php echo $newsEdit['title'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Nội dung<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="content" value="<?php echo $newsEdit['content'] ?>">
                                   
                                </div>
                                <div class="form-group">
                                    <label for="">Thời gian chỉnh sửa<span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="created_at" />
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
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            <img src="<?= BASE_URL . $newsEdit['feature_img'] ?>" id="preview-img" class="img-fluid">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Ảnh tin</label>
                                        <input type="file" class="form-control" name="feature_img" onchange="encodeImageFileAsURL(this)">
                                    </div>

                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Sửa</button>&nbsp;
                                    <a href="<?= ADMIN_URL . 'news' ?>" class="btn btn-danger">Hủy</a>
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
                $('#preview-img').attr('src', "<?= BASE_URL . $newsEdit['feature_img'] ?>");
                return false;
            }
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#preview-img').attr('src', reader.result)
            }
            reader.readAsDataURL(file);
        }
        $('#edit-news-form').validate({
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