<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
// lấy thông tin của customer ra ngoài thông id trên đường dẫn
$id = isset($_GET['id']) ? $_GET['id'] : -1;
# get contact table
$getcontactQuery = "select * from contact where id = '$id'";
$contact = queryExecute($getcontactQuery, true);

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
                            <h1 class="m-0 text-dark">Phản hồi khách hàng</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <form id="send-email-form" action="<?= ADMIN_URL . 'contact/send-email.php' ?>" method="POST">
                        <div class="form-group" hidden>
                            <?php foreach ($contact as $co) : ?>
                                <input type="text" name="id" id="id" class="form-control" value="<?= $co['id'] ?>">
                            <?php endforeach ?>
                        </div>
                        <div class="form-group" hidden>
                            <input type="text" name="reply_by" class="form-control" value="<?= $_SESSION[AUTH]['id'] ?>">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Trả lời cho khách hàng<span class="text-danger">*</span></label>
                                    <?php foreach ($contact as $co) : ?>
                                        <input type="text" name="recceiver" id="recceiver" class="form-control" value="<?= $co['email'] ?>">
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tiêu đề<span class="text-danger">*</span></label>
                                    <input type="text" id="subject" class="form-control" name="subject">
                                </div>
                                <div class="form-group">
                                    <label for="">Nội dung trả lời<span class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="3" id="reply_content" name="reply_content"></textarea>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                                    <a href="<?= ADMIN_URL . 'contact' ?>" class="btn btn-danger">Hủy</a>
                                </div>
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
        $(document).ready(function() {
            $('#send-email-form').validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 191
                    },
                    email: {
                        required: true,
                        maxlength: 191,
                        email: true,
                        remote: {
                            url: "<?= ADMIN_URL . 'users/verify-email-existed.php' ?>",
                            type: "post",
                            data: {
                                email: function() {
                                    return $("input[name='email']").val();
                                }
                            }
                        }
                    },
                    password: {
                        required: true,
                        maxlength: 191
                    },
                    cfpassword: {
                        required: true,
                        equalTo: "#main-password"
                    },
                    phone_number: {
                        number: true
                    },
                    avatar: {
                        required: true,
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
                    password: {
                        required: "Hãy nhập mật khẩu",
                        maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
                    },
                    cfpassword: {
                        required: "Nhập lại mật khẩu",
                        equalTo: "Cần khớp với mật khẩu"
                    },
                    phone_number: {
                        min: "Bắt buộc là số có 10 chữ số",
                        max: "Bắt buộc là số có 10 chữ số",
                        number: "Nhập định dạng số"
                    },
                    avatar: {
                        required: "Hãy nhập ảnh đại diện",
                        extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                    }
                }
            });
        });
    </script>
</body>

</html>