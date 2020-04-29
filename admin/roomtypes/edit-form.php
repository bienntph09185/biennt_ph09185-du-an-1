<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getroomtypesEditQuery = "select * from room_types where id = '$id'";
$roomtypesEdit = queryExecute($getroomtypesEditQuery, false);

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

                    <form id="edit-roomtypes-type-form" action="<?= ADMIN_URL . 'roomtypes/save-edit.php' ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $roomtypesEdit['id'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tên khách hàng<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $roomtypesEdit['name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Giá</label>

                                    <input type="text" class="form-control" name="price" value="<?php echo $roomtypesEdit['price'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Giới thiệu</label>

                                    <input type="text" class="form-control" name="about" value="<?php echo $roomtypesEdit['about'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Số người lớn</label>

                                    <input type="text" class="form-control" name="adult" value="<?php echo $roomtypesEdit['adult'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Số trẻ nhỏ</label>

                                    <input type="text" class="form-control" name="children" value="<?php echo $roomtypesEdit['children'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Trạng thái</label>
                                    <select name="status" class="form-control">
                                        <option value="<?= ACTIVE?>">Đang Hoạt Động</option>
                                        <option value="<?= INACTIVE?>">Tạm Nghỉ</option>
                                    </select>
                                    <!-- <input type="text" class="form-control" name="status" value=" -->

                                </div>
                                <div class="form-group">
                                    <label for="">Giới thiệu ngắn</label>

                                    <input type="text" class="form-control" name="short_desc" value="<?php echo $roomtypesEdit['short_desc'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            <img src="<?= BASE_URL . $roomtypesEdit['feature_img'] ?>" id="preview-img" class="img-fluid">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Ảnh đại diện</label>
                                        <input type="file" class="form-control" name="feature_img" onchange="encodeImageFileAsURL(this)">
                                    </div>

                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Sửa</button>&nbsp;
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
                $('#preview-img').attr('src', "<?= BASE_URL . $roomtypesEdit['feature_img'] ?>");
                return false;
            }
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#preview-img').attr('src', reader.result)
            }
            reader.readAsDataURL(file);
        }
        $('#edit-roomtypes-form').validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 191
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
                    extension: "png|jpg|jpeg|gif"
                }
            },
            messages: {
                name: {
                    required: "Hãy nhập tên người dùng",
                    maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                },
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